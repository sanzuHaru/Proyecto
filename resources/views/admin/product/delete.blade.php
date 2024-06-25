@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <h1>Producto: Eliminar registro</h1>
@stop

@section('content')
    <div class="card" style="background-color: #33414e;">
        {!! Form::open (['route' => ['product.destroy', $pro->id], 'method' => 'get']) !!}
        <div class="card-header" style="background-color: #dc3545;">
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-12 col-sm-12 col-12">
                   <fieldset style="padding: 0rem 5rem;">
                       <legend>Datos del Producto</legend>
                       <div class="row">
                           <h2 style="color: #df2e1b;">¿Está seguro de eliminar el siguiente registro?</h2>
                       </div>
                       <div class="row" style="text-align: center;">
                           <img src="{{URL::asset('imagenes/productos').'/'.$pro->img}}" style="width: 15rem;margin-left: 5rem; margin-bottom: 1rem;">
                       </div>
                       <div class="row">
                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Nombre del producto: <br> <span style="font-weight: bold;">{{$pro->nombre}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Descripción del producto: <br> <span style="font-weight: bold;">{{$pro->descripcion}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Precio del producto: <br> <span style="font-weight: bold;">{{$pro->precio_min}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Disponibilidad: <br> <span style="font-weight: bold;">{{$pro->stock}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Contenido: <br> <span style="font-weight: bold;">{{$pro->cantidad}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Precio por Mayoreo: <br> <span style="font-weight: bold;">{{$pro->precio_max}}</span></label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="font-weight: lighter;">Presentación: <br> <span style="font-weight: bold;">{{$pro->presentacion}}</span></label>
                                    </div>
                                </div>
                           </div>
                       </div>
                        <div class="row" style="float: right;">
                           <a style="margin: 1rem;" type="button" href="{{route('product.index')}}" class="btn btn-dark" title="Regresar vista principal"><i class="fas fa-solid fa-backward"></i></a>
                           <button style="margin: 1rem;" type="submit" class="btn btn-danger" title="Eliminar registro"><i class="fas fa-solid fa-trash"></i></button>
                        </div>
                   </fieldset>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
