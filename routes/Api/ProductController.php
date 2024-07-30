<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class ProductController extends BaseController
{
    public function all(){
        try{
            $data = Product::all();
            return $this->sendResponse($data, 'conexion exitosa.');
        }catch(Exception $e){
            return $this->sendError('Error al consultar productos.', $e->errors()); 
        }
        
    }

    public function search($id){
        $product = Product::where('id','=',$id)->get();
        return $this->sendResponse($product, 'Producto encontrado');
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return $this->sendResponse(null, 'Producto eliminado correctamente');
    }
}
