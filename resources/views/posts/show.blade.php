<x-app-layout>
    {{-- <a href="{{route('home')}}" 
    class="absolute top-28 left-20 text-xl text-white hover:text-[#49B2FF] bg-[#212940] py-1 px-2 rounded-lg top invisible sm:visible">
        <i class="fa-solid fa-arrow-left"></i>
    </a> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex bg-[#212940] p-5">
                    <div class="mt-1 px-2 sm:px-8 text-white text-center">
                        <a href="{{route('posts.upvote', $post)}}" class="text-2xl hover:text-[#49B2FF] text-[#ACACAC]
                        {{$post->currentUserVote && $post->currentUserVote->vote===1 ? 'text-[#49B2FF]' : ''}}">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        <p class="text-lg my-3">{{$post->vote}}</p>
                        <a href="{{route('posts.downvote', $post)}}" class="text-2xl hover:text-[#49B2FF] text-[#ACACAC]
                        {{$post->currentUserVote && $post->currentUserVote->vote===-1 ? 'text-[#49B2FF]' : ''}}">
                            <i class="fa-solid fa-minus"></i>
                        </a>
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

                        <form action="{{route('comments.store', $post)}}" method="POST">
                            @csrf
                            <input class="mt-5 placeholder:text-slate-400 block bg-[#222C49] w-full border border-[#1C6FAC] rounded shadow-sm focus:outline-none focus:border-[#1C6FAC] focus:ring-[#1C6FAC] focus:ring-1 sm:text-sm text-gray-300" 
                                placeholder="Escribe un comentario..." type="text" name="text"/>
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </form>

                        <div class="mt-5">
                            @forelse ($post->comments as $comment)
                                <p class="text-white text-xs">
                                    <a href="#" class="text-[#49B2FF]">S4avitar445 <strong>(189)</strong></a>
                                    <span>|</span>
                                    <span>{{$comment->created_at->diffForHumans()}}</span>
                                </p>
                                <p class="text-xs mb-3">
                                    {{$comment->text}}
                                </p>
                            @empty
                                <p class="text-xs text-gray-300">
                                    Todavía no hay comentarios
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>