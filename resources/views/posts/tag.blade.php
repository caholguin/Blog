<x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Etiqueta: {{$tag->name}}</h1>

        @foreach ($posts as $pos)
            <x-card-post :pos="$pos"/>
        @endforeach

            <div>
                {{$posts->links()}}
            </div>

    </div>

</x-app-layout>