<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#212940] overflow-hidden sm:rounded-lg my-5 p-4">
                <p class="text-white text-xl mb-3">{{$user->name}}</p>

                <p class="text-white">Puntos: <span class="text-[#49B2FF]">{{$user->reputation}}</span></p>
                <p class="text-white">Publicaciones realizadas: <span class="text-[#49B2FF]">{{count($user->posts)}}</span></p>
            </div>
        </div>
    </div>
</x-app-layout>