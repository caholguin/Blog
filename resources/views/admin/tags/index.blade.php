@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Lista de etiquetas</h1>
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
            @can('admin.tags.create')
            <a class="btn btn-secondary " href="{{route('admin.tags.create')}}">Agregar etiqueta</a>
            @endcan
        </div>

        <div class="card-body">
            <table class="table table-striped border ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

