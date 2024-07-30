<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class CategoryController extends Controller
{
    
    public function categorias(Request $request)
    {
        $search = "";
        $limit = 5;
        if ($request->has('search')) {
            $search = $request->input('search');

            if (trim($search) != '') {
                $data = Category::where('nombre', 'like', "%$search%")
                    ->orwhere('descripcion', 'like', "%$search%")->get();
            } else {
                $data = Category::all();
            }
        } else {
            $data = Category::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.categorias.categorias', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function create()
    {
        return view('admin.categorias.create');
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
                'descripcion' => ['required', 'string', 'max:40'],
            ]);


            Category::create([
                'nombre' => $request['name'],
                'descripcion' => $request['descripcion'],
            ]);


            DB::commit();
            Session::flash('status', "Se ha agregado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('category.categorias'));

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
        $category = Category::findOrFail($id);
        // dd($category);
        return view('admin.categorias.edit', ['category' => $category]);
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
                'nombre' => $request['name'],
                'descripcion' => $request['descripcion'],
            ];
            $category = Category::findOrFail($id);
            $category->update($data);
            DB::commit();
            Session::flash('status', "Se ha editado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('category.categorias'));
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
        $category = Category::findOrFail($id);
        // dd($category);
        return view('admin.categorias.show', ['category' => $category]);
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        return view('admin.categorias.delete', ['category' => $category]);
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $category = Category::findOrFail($id);
            $category->delete();
            DB::commit();
            Session::flash('status', "Se ha eliminado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('category.categorias'));
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
