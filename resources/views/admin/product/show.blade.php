@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <h1>Producto: Mostrar registro</h1>
@stop

@section('content')
    <div class="card" style="background-color: #33414e;">
        <div class="card-header" style="background-color: #28a745;">
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-12 col-sm-12 col-12">
                   <fieldset>
                       <legend>Información del producto</legend>
                       <div style="text-align: center; padding:1rem;">
                       <img class="img-fluid" src="{{URL::asset('imagenes/productos').'/'.$pro->img}}" alt="..." />

                       </div>
                       <div class="row">
                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Nombre del producto: <br> {{$pro->nombre}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Descripción del producto: <br> {{$pro->descripcion}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Precio del producto: <br> {{$pro->precio_min}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Precio del producto por mayoreo: <br> {{$pro->precio_max}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Contenido por kilo: <br> {{$pro->cantidad}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Disponibilidad: <br> {{$pro->stock}}</label>
                                    </div>
                                </div>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Presentación: <br> {{$pro->presentacion}}</label>
                                    </div>
                                </div>
                           </div>

                        <div class="row" style="float: right;">
                           <a style="margin: 1rem;" type="button" href="{{route('product.index')}}" class="btn btn-dark" title="Regresar vista principal"><i class="fas fa-solid fa-backward"></i></a>
                        </div>
                   </fieldset>
                </div>

            </div>
        </div>
    </div>
@stop