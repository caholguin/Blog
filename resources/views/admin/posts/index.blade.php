@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')

<h1>Lista de posts</h1>

<a class="btn btn-secondary btn-sm mt-2" href="{{route('admin.posts.create')}}">Nuevo post</a>

@stop

@section('content')
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop