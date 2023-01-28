<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($posts)>0)
                <p class="text-white text-lg">Se muestran publicaciones con la etiqueta <span class="text-[#49B2FF]">{{$tag->name}}</span></p>
                @foreach ($posts as $post)
                    <div class="bg-[#212940] overflow-hidden sm:rounded-lg my-5 p-4">
                        <div class="flex">
                            <div class="flex items-center px-3 text-white">
                                <i class="fa-solid fa-plus mr-2"></i>
                                <p class="text-lg">{{$post->vote}}</p>
                            </div>
                            <div class="px-4">
                                <a href="{{route('posts.show', $post)}}" class="text-white text-xl block mb-3">{{$post->name}}</a>
                                <div class="flex text-white mb-3">
                                    @foreach ($post->tags as $tag)
                                        <a href="#" class="text-xs mr-2 py-[2px] px-2 bg-[#175C8F] rounded">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                                <p class="text-white text-xs">Publicado por 
                                    <a href="#" class="text-[#49B2FF]">S4avitar445 <strong>(189)</strong></a>
                                    <span>|</span>
                                    <span>{{$post->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-[#212940] overflow-hidden sm:rounded-lg my-5 p-4 text-center">    
                    <p class="text-white text-lg">No se han encontrado publicaciones que contengan la etiqueta <span class="text-[#49B2FF]">{{$tag->name}}</span></p>
                    <p class="text-gray-300">Intente buscar publicaciones con otra etiqueta</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>