<x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{$category->name}}</h1>

        @foreach ($post as $pos)
            <x-card-post :pos="$pos"/>
        @endforeach

            <div>
                {{$post->links()}}
            </div>

    </div>

</x-app-layout>