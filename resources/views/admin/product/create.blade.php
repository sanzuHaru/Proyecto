@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Bienvenido: Productos-Nuevo registro</h1>
@stop

@section('content')

@if(Session::has('status'))
    <div class="col-md-12 alert-section">
        <div class="alert alert-{{Session::get('status_type')}}" style="text-align: center; padding: 5px; margin-bottom: 5px;">
            <span style="font-size: 20px; font-weight: bold;">
                {{Session::get('status')}}
                @php
                    Session::forget('status');
                @endphp
            </span>
        </div>
    </div>
@endif

<div class="card"style="background-color: #33414e;">
        <div class="card-header" style="background-color: #f3dc06;">
        </div>
        <div class="card-body"style="background-color: #33414e;">
            <div class="row">
                
            {!!Form::open(['route' => 'product.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                <div class="col-lg-12 col-sm-12 col-12">
                   <fieldset>
                       <legend>Insertar un nuevo producto</legend>
                       <div class="row">
                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTText('nombre', 'Nombre del producto', 'Nombre del producto a registrar', null, $errors, 40, true) !!}
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTFile('img', 'Imagen del producto', 'Imagen del producto a registrar', null, $errors, 40, true) !!}
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTNumeric('stock', 'Stock del producto', 'Stock del producto a registrar', null, $errors, 30, true) !!} 
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTText('marca', 'Marca del producto', 'Marca del producto a registrar', null, $errors, 40, true) !!}
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTText('descrip', 'Descripción del producto', 'Descripción del producto a registrar', null, $errors, 40, true) !!}
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTNumeric('precio_min', 'Precio del producto', 'Precio del producto', null, $errors, 30, true) !!} 
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTNumeric('precio_max', 'Precio por Mayoreo', 'Precio del producto por Mayoreo', null, $errors, 30, true) !!} 
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTNumeric('cantidad', 'Contenido por kilo', 'Contenido', null, $errors, 30, true) !!} 
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTText('pres', 'Presentación del producto', 'Presentación del producto a registrar', null, $errors, 40, true) !!}
                           </div>

                           <div class="col-lg-4 col-sm-4 col-4">
                                {!! Form::UTList('categoria', 'Categoría', 'Categoría del producto', $cat, null , $errors, true) !!} 
                           </div>
                        </div>

                        <div class="row" style="float: right;">
                           <a style="margin: 1rem;" type="button" href="{{route('product.index')}}" class="btn btn-dark" title="Regresar vista principal"><i class="fas fa-solid fa-backward"></i></a>
                           <button style="margin: 1rem;" type="submit" class="btn btn-success" title="Registrar nueva categoría"><i class="fas fa-solid fa-check-circle"></i></button>
                        </div>
                   </fieldset>
                </div>
            {!!Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('js/validatorFields.js')}}">
    </script>
   <script src="{{asset('js/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
   <script src="{{asset('js/datepicker/js/bootstrap-datepicker.js')}}"></script>
   <script src="{{asset('js/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
@endsection