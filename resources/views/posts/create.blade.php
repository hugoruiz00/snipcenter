<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1C6FBC] overflow-hidden sm:rounded-t-lg">
                <div class="py-4 px-6 bg-[#1C6FAC] text-white text-lg">
                    Nueva publicación
                </div>
                <div class="p-6 bg-[#212940]">
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input placeholder="Agregue un título descriptivo a su porción de código" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-5">
                        <x-primary-button class="sm:w-1/5 justify-center">
                            {{ __('Save') }}
                        </x-primary-button>               
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>