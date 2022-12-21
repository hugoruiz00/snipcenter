<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex bg-[#212940] p-5">
                    <div class="mt-1 px-8 text-white text-center">
                        <a href="{{route('posts.upvote', $post)}}" class="text-lg text-[#49B2FF] hover:text-[#1C6FAC]"><i class="fa-solid fa-plus"></i></a>
                        <p class="text-lg my-3">{{$post->votes}}</p>
                        <a href="{{route('posts.downvote', $post)}}" class="text-lg text-[#49B2FF] hover:text-[#1C6FAC]" ><i class="fa-solid fa-minus"></i></a>
                    </div>
                    <div class="text-white w-full">
                        <p class="text-xl">{{$post->name}}</p>

                        <div class="my-4 p-4 rounded-md shadow-sm bg-[#171D2E] border-[#1C6FAC] border-2 text-white">
                            {!!$post->body!!}
                        </div>

                        <div class="flex text-white mb-3">
                            @foreach ($post->tags as $tag)
                                <a href="#" class="text-xs mr-2 py-[2px] px-2 bg-[#175C8F] hover:bg-[#1C6FAC] rounded">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <p class="text-white text-xs">Publicado por 
                            <a href="#" class="text-[#49B2FF] hover:text-[#1C6FAC]">S4avitar445 <strong>(189)</strong></a>
                            <span>|</span>
                            <span>{{$post->created_at->diffForHumans()}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>