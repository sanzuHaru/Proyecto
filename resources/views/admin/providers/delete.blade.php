@extends('adminlte::page')
@include('landing.include.head')

@section('content_header')
<h1 style="padding: 1rem;">Proveedores: Eliminar registro</h1>

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
        <div class="card-header" style="background-color: #dc3545;">
            
        </div>
        <div class="card-body">
            <div class="row">
                
            {!!Form::open(['route'=>['providers.destroy' , $providers->id], 'method' =>'get'])!!}
                <div class="col-lg-12 col-sm-12 col-12" >
                    <legend>Datos Proveedores</legend>
                    <div class="row">
                        <h2 style="color:#df2e1b">¿Estas seguro de eliminar este registro?</h2>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #1e2e40;">
                            <h3 class="card-title">Información Requerida</h3>
                        </div>
                        <div class="card-body" style="background-color: #33414e;">
                        <div class="form-group">
                            {!!Form::UTTextOnly('razon_social', 'Razón Social', 'Razón Social  ', $providers->razon_social, $errors, 40, true, true )!!}
                        </div>
                        <div class="form-group">
                            {!!Form::UTTextOnly('telefono', 'Teléfono', 'telefono', $providers->telefono, $errors, 40, true, true )!!}
                        </div>
                        <div class="form-group">
                            {!!Form::UTTextOnly('domicilio_fiscal', 'Domicilio Fiscal', 'Domicilio Fiscal', $providers->domicilio_fiscal, $errors, 40, true, true )!!}
                        </div>
                        <div class="form-group">
                            {!!Form::UTTextOnly('direccion', 'Dirección', 'Dirección', $providers->direccion, $errors, 40, true, true )!!}
                        </div>
                         </div>
                        <div class="card-footer" style="background-color: #33414e;">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a type="button" href="{{ route('providers.index') }}" class="btn btn-primary">Regresar</a>
                         </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
        <script src="{{asset('js/validatorFields.js')}}"></script>
<@endsection()