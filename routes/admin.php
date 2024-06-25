<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class, 'index']);

Route::group(['prefix' => 'productview'], function(){
    Route::get('/productos',[App\Http\Controllers\Admin\HomeController::class, 'producto'])->name('admin.productos');

});
Route::group(['prefix' => 'users'], function(){
    Route::get('/usuarios',[App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/nuevo',[App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('/store',[App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::get('/show/{id}',[App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\UserController::class, 'delete'])->name('users.delete');
    Route::get('/{id}/destroy',[App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
});
Route::group(['prefix' => 'category'], function(){
    Route::get('/categorias',[App\Http\Controllers\Admin\CategoryController::class, 'categorias'])->name('category.categorias');
    Route::get('/nuevo',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
    Route::post('/store',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    Route::get('/show/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('category.show');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/{id}/destroy',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group(['prefix' => 'product'], function(){
    Route::get('/productos', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id_pro}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/{id_pro}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update');
    Route::get('/show/{id_pro}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product.show');
    Route::get('/delete/{id_pro}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete');
    Route::get('{id_pro}/destroy', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product.destroy');
});

Route::group(['prefix' => 'providers'], function(){
    Route::get('/proveedores', [App\Http\Controllers\Admin\ProveedoresController::class, 'index'])->name('providers.index');
    Route::get('/create', [App\Http\Controllers\Admin\ProveedoresController::class, 'create'])->name('providers.create');
    Route::post('/store', [App\Http\Controllers\Admin\ProveedoresController::class, 'store'])->name('providers.store');
    Route::get('/edit/{id_pro}', [App\Http\Controllers\Admin\ProveedoresController::class, 'edit'])->name('providers.edit');
    Route::put('/{id_pro}', [App\Http\Controllers\Admin\ProveedoresController::class, 'update'])->name('providers.update');
    Route::get('/show/{id_pro}', [App\Http\Controllers\Admin\ProveedoresController::class, 'show'])->name('providers.show');
    Route::get('/delete/{id_pro}', [App\Http\Controllers\Admin\ProveedoresController::class, 'delete'])->name('providers.delete');
    Route::get('{id_pro}/destroy', [App\Http\Controllers\Admin\ProveedoresController::class, 'destroy'])->name('providers.destroy');
});