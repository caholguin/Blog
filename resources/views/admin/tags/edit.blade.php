@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar etiqueta</h1>
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
        <form action="{{route('admin.tags.update', $tag)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la etiqueta..." value="{{old('name', $tag->name)}}">
                
                @error('name')
                <small class="text-danger">{{$message}}</small>    
                @enderror

            </div>
            <div class="form-group ">
                <label for="">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Ingrese el slug de la etiqueta..." value="{{old('slug', $tag->slug)}}">
            
                @error('slug')
                <small class="text-danger">{{$message}}</small>    
                @enderror

            </div>
            <div class="form-group ">
                <label for="color">Color</label>
                <select id="color" name="color" class="form-control">
                <option value="{{$tag->color}}">Color {{$tag->color}}</option>
                <option value="red">Color rojo</option>
                <option value="green">Color verde</option>
                <option value="yellow">Color amarillo</option>
                <option value="indigo">Color indigo</option>
                <option value="blue">Color azul</option>
                <option value="purple">Color morado</option>
                <option value="pink">Color rosado</option>
                </select>

                @error('color')
                <small class="text-danger">{{$message}}</small>    
                @enderror

            </div> 

            <button type="submit" class="btn btn-primary">Actualizar etiqueta</button>
            <a class="btn btn-danger ml-2" href="{{route('admin.tags.index')}}">Cancelar</a>
        </form>

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>    
   
   <script>
       $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
   </script>

@endsection