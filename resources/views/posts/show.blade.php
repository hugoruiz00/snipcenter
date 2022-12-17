<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex p-6 bg-[#212940] ">
                    <div class="px-3 text-white">
                        <a href="#"><i class="fa-solid fa-plus"></i></a>
                        <p class="text-lg">1</p>
                        <a href="#"><i class="fa-solid fa-minus"></i></a>
                    </div>
                    <div class="text-white">
                        <p class="text-lg">{{$post->name}}</p>

                    

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
        </div>
    </div>
</x-app-layout>