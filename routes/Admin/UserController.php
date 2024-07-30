<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = "";
        $limit = 5;
        if ($request->has('search')) {
            $search = $request->input('search');

            if (trim($search) != '') {
                $data = User::where('name', 'like', "%$search%")
                    ->orwhere('email', 'like', "%$search%")->get();
            } else {
                $data = User::all();
            }
        } else {
            $data = User::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.usuarios.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }
    
    public function create()
    {
        // $role = Role::all();

        return view('admin.usuarios.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            // DB::beginTransaction();
            // dd($request);

            DB::beginTransaction();
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:40'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);


            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);


            DB::commit();
            Session::flash('status', "Se ha agregado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('users.index'));

        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Session::flash('status', $ex->getMessage());
            Session::flash('status_type', 'error-Query');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('status', $e->getMessage());
            Session::flash('status_type', 'error');
            return back();
        }
    }
    public function edit($id)
    {
        // $role = Role::all();
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.usuarios.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // $validated = $request->validate([
            //     'nombre' => ['required', 'string', 'max:100'],
            //     'password' => ['required', 'string', 'min:8'],
            // ]);

            $valida = User::where('email', '=', $request['email'])->first();
            if ($valida != null && $valida->id == $id) {
                if ($request['password'] != null) {
                    $data = [
                        'name' => $request['name'],
                        'password' => Hash::make($request['password'])
                    ];
                } else {
                    $data = [
                        'name' => $request['name'],
                    ];
                }
            } elseif ($valida == null) {
                if ($request['password'] != null) {
                    $data = [
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password'])
                    ];
                } else {
                    $data = [
                        'name' => $request['name'],
                        'email' => $request['email']
                    ];
                }
            } else {
                Session::flash('status', "Correo electrónico ya asignado ");
                Session::flash('status_type', 'warning');
                return back();
            }
            $user = User::findOrFail($id);
            // $user->role()->sync($request->role);
            $user->update($data);
            DB::commit();
            Session::flash('status', "Se ha editado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('users.index'));
        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Session::flash('status', $ex->getMessage());
            Session::flash('status_type', 'error-Query');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('status', $e->getMessage());
            Session::flash('status_type', 'error');
            return back();
        }

    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.usuarios.show', ['user' => $user]);
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.usuarios.delete', ['user' => $user]);
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
            Session::flash('status', "Se ha eliminado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('users.index'));
        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Session::flash('status', $ex->getMessage());
            Session::flash('status_type', 'error-Query');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('status', $e->getMessage());
            Session::flash('status_type', 'error');
            return back();
        }
    }
}
