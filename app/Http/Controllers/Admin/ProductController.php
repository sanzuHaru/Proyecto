<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller

{
    public function index(Request $request)
    {
        $search = "";
        $limit = 5;
        if($request->has('search'))
        {
            $search = $request->input('search');
            if(trim($search) != '')
            {
                $data = Product::where('nombre', 'like', "%$search%")->get();
            }else{
                $data = Product::all();
            }
        }else{
            $data = Product::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage =$limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)-> all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);

        return view ('admin.product.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }
    public function create()
    {
        $product = new Product();
        $cat = Category::pluck('nombre', 'id');

        return view('admin.product.create', compact('product', 'cat'));
    }
    public function store(Request $request)
    {
        // dd($request);

        try{
            DB::beginTransaction();
    
            $namefile =$request['nombre'].'_';
            $ext_file = array('jpg','png','jpeg');
    
            $value = $this->loadimage($request,'img',$ext_file,1000,1000,2000000,$namefile,'imagenes/productos');
            if ($value === 'tamano' || $value === 'formato' || $value === 'existencia' || $value === 'dimension') {
                Session::flash('status', 'La imagen del producto no pudo ser guardada, ya que representa un problema de :) '.$value);
                Session::flash('status_type', 'warning');
                return back()->withInput();
            }
    
            $dataproducto = [
    
                'id_categoria' => $request['categoria'],
                'nombre' => $request['nombre'],
                'img' => $value,
                'stock' => $request['stock'],
                'marca' => $request['marca'],
                'descripcion' => $request['descrip'],
                'precio_max' => $request['precio_max'],
                'precio_min' => $request['precio_min'],
                'cantidad' => $request['cantidad'],
                'presentacion' => $request['pres'],
    
            ];
            $producto = new Product($dataproducto);
            $producto->save();
    
    
            DB::commit();
            Session::flash('status', "Se ha agregado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('product.index'));
    
        }catch(\Illuminate\Database\QueryException $ex){
            DB::rollBack();
            Session::flash('status', $ex->getMessage());
            Session::flash('status_type', 'error-Query');
            return back();
        }catch(\Exception $e)
        {
            DB::rollBack();
                Session::flash('status', $e->getMessage());
                Session::flash('status_type', 'error');
                return back();
        }

        

    }
    public function show($id)
    {
        $producto = Product::findOrFail($id);
        // dd($category);
        return view('admin.product.show', ['pro' => $producto]);
    }
    public function edit($id)
    {
        $producto = Product::findOrFail($id);
        $cat = Category::pluck('nombre', 'id');

        // dd($category);
        return view('admin.product.edit', ['pro' => $producto, 'cat' => $cat]);
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            if ($request->file('img') != null) {
                # code...
                $namefile =$request['nombre'].'_';
            $ext_file = array('jpg','png','jpeg');
            
            $value = $this->loadimage($request,'img',$ext_file,1000,1000,2000000,$namefile,'imagenes/productos');
            if ($value === 'tamano' || $value === 'formato' || $value === 'existencia' || $value === 'dimension') {
                Session::flash('status', 'La imagen del producto no pudo ser guardada, ya que representa un problema de :) '.$value);
                Session::flash('status_type', 'warning');
                return back()->withInput();
            }
            
            // $validated = $request->validate([
            //     'nombre' => ['required', 'string', 'max:100'],
            //     'password' => ['required', 'string', 'min:8'],
            // ]);
            
            $data = [
                'id_categoria' => $request['categoria'],
                'nombre' => $request['nombre'],
                'img' => $value,
                'stock' => $request['stock'],
                'marca' => $request['marca'],
                'descripcion' => $request['descrip'],
                'precio_max' => $request['precio_max'],
                'precio_min' => $request['precio_min'],
                'cantidad' => $request['cantidad'],
                'presentacion' => $request['pres'],
            ];
            $producto = Product::findOrFail($id);
            $producto->update($data);
            }else {
                # code...
                $data = [
                    'id_categoria' => $request['categoria'],
                    'nombre' => $request['nombre'],
                    'stock' => $request['stock'],
                    'marca' => $request['marca'],
                    'descripcion' => $request['descrip'],
                    'precio_max' => $request['precio_max'],
                    'precio_min' => $request['precio_min'],
                    'cantidad' => $request['cantidad'],
                    'presentacion' => $request['pres'],
                ];
                $producto = Product::findOrFail($id);
                $producto->update($data);
            }
            DB::commit();
            Session::flash('status', "Se ha editado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('product.index'));
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
    public function delete($id)
    {
        $producto = Product::findOrFail($id);
        // dd($category);
        return view('admin.product.delete', ['pro' => $producto]);
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $producto = Product::findOrFail($id);
            $producto->delete();
            DB::commit();
            Session::flash('status', "Se ha eliminado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('product.index'));
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
    
    function loadimage($request, $nameimg, $mimearray, $min, $max, $maxweight, $nameimage, $urlimage){
        if ($request->file($nameimg) != null) {
                $extension = strtolower($request->file($nameimg)->getClientOriginalExtension());
                if (in_array($extension, $mimearray)){
                    $size = getimagesize($request->file($nameimg));
                    if ($size[0] <= $min && $size[1] <=$max){
                        $weight = $_FILES[$nameimg]['size'];
                        if ($weight < $maxweight) {
                            //guardamos la imagen
                            $name = $nameimage . date("d") . date("H") . date("i") . date("s") . '.' . $extension;
                            $path = public_path($urlimage);//obtenemos la ruta del archivo
                            $request->file($nameimg)->move($path, $name);
                            $value = $name;
                            return $value;
                        } else {return 'tamano';}
                    }else {return 'dimension';}
                } else {return 'formato';}
            }else {return 'existencia';}

    }

}
