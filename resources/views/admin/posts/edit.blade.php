@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar posts</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.posts.update', $post)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input  name="user_id" type="hidden" value="{{auth()->user()->id}}">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del post..." value="{{old('name', $post->name)}}">
                
                @error('name')
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            </div>
            <div class="form-group ">
                <label for="">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Ingrese el slug del post..." value="{{old('slug', $post->slug)}}">
            
                @error('slug')
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            </div>

            <div class="form-group ">
                <label for="category_id">Categoria</label>
                <select id="category_id" name="category_id" class="form-control" >
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}} </option>
                  @endforeach
                </select>

                @error('category_id')
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            </div> 

            <div class="form-group  ">
                <p class="font-weight-bold">Etiquetas</p>                
                @foreach ($tags as $tag)
                    <label>                                                             
                        <input type="checkbox" class=""  name="tags[]" value="{{$post->tag_id}} " >
                        {{$tag->name}}                                                        
                    </label>
                @endforeach                   

                @error('tags')
                 <br>
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            </div>

            <div class="form-group ">
                <p class="font-weight-bold">Estado</p> 
                
                <label class="ml-4">                    
                    @if ($post->status == 1)
                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked> Borrador
                    <label class="ml-4">
                        <input class="form-check-input " type="radio" name="status" id="status" value="2"> Publicado
                    </label>
                    @else
                    <input class="form-check-input" type="radio" name="status" id="status" value="2" checked> Publicado
                    <label class="ml-4">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1"> Borrador
                    </label>
                    @endif
                    
                </label>                

                @error('status')
                <br>
                <small class="text-danger">{{$message}}</small>   
                @enderror

            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture" src="@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2021/06/20/12/22/coffee-6350849_960_720.jpg @endif" alt="">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Imagen que se mostrará en el post</label>
                        <input class="form-control-file" type="file" name="file" id="file" accept="image/*">
                        
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum explicabo impedit distinctio rem quae laudantium molestiae itaque sunt, iusto, autem et. Soluta tenetur hic ipsa, in doloribus eveniet distinctio possimus?</p>
                </div>
            </div>

            <div class="form-group ">
                <label>Extracto</label>
                <textarea class="form-control" name="extract" id="extract" cols="30" rows="10" >{{old('extract', $post->extract)}}</textarea>
            
                @error('extract')
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            </div>

            <div class="form-group ">
                <label>Cuerpo del post</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{old('body', $post->body)}}</textarea>
            
                @error('body')
                 <small class="text-danger">{{$message}}</small>    
                @enderror
            
            </div>             
            
                   
                <button type="submit" class="btn btn-primary">Crear post</button>
                <a class="btn btn-danger ml-2" href="{{route('admin.posts.index')}}">Cancelar</a>
            
        </form>
    </div>
</div>
@stop

@section('css')
<Style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
    }

    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</Style>
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>    
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

   <script>
       $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });


        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );


        //cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);
        
        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src',event.target.result);
            };

            reader.readAsDataURL(file);
        }
   </script>
@stop