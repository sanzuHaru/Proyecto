@extends('adminlte::page')
@section('content_header')
    <style>
        .flex{
            display: flex;
        }
    </style>
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
        <div class="card-header">
            <ul>
                <a type="button" href="{{route('users.create')}}  " class="btn btn-dark" title="Crear nuevo registro"><i class="fas fa-solid fa-plus">  Nuevo registro</i></a>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="body table-responsive">
                        <div class="row">
                            <div class="col-lg-7 col-sm-7 col-7">
                                <h6>{{$data->total()}} Registro(s) encontrado(s). Página
                                {{($data->total() ==0) ? '0' : $data->currentPage()}} de
                                {{$data->lastPage()}} Registros por página.
                                {{($data->total()==0) ? '0' : $data->perPage()}}
                                </h6>
                                
                            </div>
                            <div class="col-lg-5 col-sm-5 col-5">
                                <form action="{{route('users.index')}}" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                        value="{{$search}}" placeholder="Dato a buscar">
                                        <span style="background-color: #33414e;     padding-block-end: 5%;    padding-left: 3%;">
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Identificador</th>
                                <th style="width: 30%;">Nombre</th>
                                <th style="width: 30%;">Correo electrónico</th>
                                <th style="width: 20%;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('users.show',$row->id)}}" title="Mostrar Registro"><i class="fas fa-solid fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{route('users.edit',$row->id)}}" title="Editar Registro"><i class="fas fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" href="{{route('users.delete',$row->id)}}" title="Eliminar Registro"><i class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                       {{ $data->setPath(route('users.index'))->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop