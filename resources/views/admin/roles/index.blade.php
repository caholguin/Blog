@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show">        
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            
                <a class="btn btn-secondary " href="{{route('admin.roles.create')}}">Agregar rol</a>
           
        </div>

        <div class="card-body">

            <table class="table table-stripe border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit', $rol)}}" >Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $rol)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop