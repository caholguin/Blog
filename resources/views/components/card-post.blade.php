@props(['pos'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($pos->image)
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($pos->image->url)}}" alt="">

    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/01/28/21/12/wave-5959087_960_720.jpg" alt="">
 
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $pos)}}">{{$pos->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{-- //esto con el fin de que no salga la etiqueta de hatml luego de usar la librearia de texto enriqecido --}}
            {{-- de no usar la libreria se deja asi {{$pos->extract}} --}}
            {!!$pos->extract!!}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($pos->tags as $tag)
            <a href="{{route('posts.tag', $tag)}}" class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
        @endforeach
    </div>
</article>