@extends('adminlte::page')
@include('landing.include.head')

@section('content_header')
<h1 style="padding: 1rem;">Categorías: Editar registro</h1>

    @if (Session::has('status'))
        <div class="col-md-12 alert-section">
            <div class="alert alert-{{ Session::get('status_type') }}"
                style="text-align: center; padding: 5px; margin-bottom: 5px;">
                <span style="font-size: 20px; font-weight: bold;">
                    {{ Session::get('status') }}
                    @php
                        Session::forget('status');
                    @endphp
                </span>
            </div>
        </div>
    @endif

    <div class="card" style="background-color: #33414e;">
        <div class="card-header" style="background-color: #007bff;">
            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="card card-primary" style="background-color: #33414e;">
                    <div class="card-header"style="background-color: #1e2e40;">
                            <h3 class="card-title">Información</h3>
                        </div>

                        {!!Form::model($category,['route'=>['category.update' , $category->id], 'method' =>'put'])!!}
                        <div class="card-body">
                        <div class="form-group">
                            {!!Form::UTTextOnly('name', 'Nombre de la Categoria', 'Nombre del usuario', $category->nombre, $errors, 40, true )!!}
                        </div>
                        <div class="form-group">
                            {!!Form::UTTextOnly('descripcion', 'Descripción', 'Descripción', $category->descripcion, $errors, 40, true )!!}
                        </div>
         
                         </div>

                        <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Guardar</button>
                        <a type="button" href="{{ route('category.categorias') }}" class="btn btn-danger">Regresar</a>
                         </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
        <script src="{{asset('js/validatorFields.js')}}"></script>
<@endsection()