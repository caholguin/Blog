@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')

<h1>Lista de posts</h1>

<a class="btn btn-secondary btn-sm mt-2" href="{{route('admin.posts.create')}}">Nuevo post</a>

@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show">        
            <strong>{{session('info')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
    @endif

    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop