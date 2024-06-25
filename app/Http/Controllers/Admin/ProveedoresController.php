<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedores;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProveedoresController extends Controller
{
    
    public function index(Request $request)
    {
        $search = "";
        $limit = 5;
        if ($request->has('search')) {
            $search = $request->input('search');

            if (trim($search) != '') {
                $data = Proveedores::where('razon_social', 'like', "%$search%")
                    ->orwhere('telefono', 'like', "%$search%")
                    ->orwhere('domicilio_fiscal', 'like', "%$search%")
                    ->orwhere('direccion', 'like', "%$search%")->get();
            } else {
                $data = Proveedores::all();
            }
        } else {
            $data = Proveedores::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.providers.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function create()
    {
        return view('admin.providers.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            // DB::beginTransaction();
            // dd($request);

            DB::beginTransaction();
            $validated = $request->validate([
                'razon_social' => ['required', 'string', 'max:40'],
                'telefono' => ['required', 'string', 'max:40'],
                'domicilio_fiscal' => ['required', 'string', 'max:40'],
                'direccion' => ['required', 'string', 'max:40'],
            ]);


            Proveedores::create([
                'razon_social' => $request['razon_social'],
                'telefono' => $request['telefono'],
                'domicilio_fiscal' => $request['domicilio_fiscal'],
                'direccion' => $request['direccion'],
            ]);


            DB::commit();
            Session::flash('status', "Se ha agregado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('providers.index'));

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
        $providers = Proveedores::findOrFail($id);
        // dd($providers);
        return view('admin.providers.edit', ['providers' => $providers]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // $validated = $request->validate([
            //     'nombre' => ['required', 'string', 'max:100'],
            //     'password' => ['required', 'string', 'min:8'],
            // ]);
            
            $data = [
                'razon_social' => $request['razon_social'],
                'telefono' => $request['telefono'],
                'domicilio_fiscal' => $request['domicilio_fiscal'],
                'direccion' => $request['direccion'],
            ];
            $providers = Proveedores::findOrFail($id);
            $providers->update($data);
            DB::commit();
            Session::flash('status', "Se ha editado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('providers.index'));
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
        $providers = Proveedores::findOrFail($id);
        // dd($providers);
        return view('admin.providers.show', ['providers' => $providers]);
    }
    public function delete($id)
    {
        $providers = Proveedores::findOrFail($id);
        // dd($providers);
        return view('admin.providers.delete', ['providers' => $providers]);
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $providers = Proveedores::findOrFail($id);
            $providers->delete();
            DB::commit();
            Session::flash('status', "Se ha eliminado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('providers.index'));
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
