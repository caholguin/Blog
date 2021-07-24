@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar rol</h1>
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
        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method'=>'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
            
                @error('name')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                @enderror
            </div>

            <h2 class="h3">Lista de permisos</h2>

            @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-danger ml-2" href="{{route('admin.roles.index')}}">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop