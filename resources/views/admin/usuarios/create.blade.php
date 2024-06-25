@extends('adminlte::page')
@include('landing.include.head')

@section('content_header')
<h1 style="padding: 1rem;">Bienvenido: Usuarios-Nuevo registro</h1>
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
        <div class="card-header" style="background-color: #f3dc06;">
        
        </div>
        <div class="card-body" >
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="card card-primary" style="background-color: #33414e;">
                        <div class="card-header"style="background-color: #1e2e40;">
                            <h3 class="card-title">Información Requerida</h3>
                        </div>


                        {!!Form::open(['route'=>'users.store', 'method' =>'post', 'entype' => 'multipart/form-data'])!!}
                            <div class="card-body">
                                <div class="form-group">
                                    {!!Form::UTTextOnly('name', 'Nombre del usuario', 'Nombre del usuario', null, $errors, 40, true )!!}
                                </div>
                                <div class="form-group">
                                    {!!Form::UTEmail('email', 'Correo electrónico', 'Correo electrónico', null, $errors, 50, true )!!}
                                </div>
                                <div class="form-group">
                                {!!Form::UTPassword('password', 'Password', 'Password', $errors, 8, 10 )!!}
                                </div>
                                <!-- <div class="form-group">
                                {!!Form::UTPassword('InputPassword2', 'Confirmar password', 'Confirmar password', $errors, 8, 10 )!!}

                                </div> -->
                                
                            </div>

                            <div class="card-footer" style="background-color: #33414e;">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a type="button" href="{{ route('users.index') }}" class="btn btn-danger">Regresar</a>
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