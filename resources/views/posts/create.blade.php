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

                    <div class="mt-4">
                        <x-input-label for="body" :value="__('Porción de código')" />
                        <x-textarea-input placeholder="Ingrese su porción de código y de ser necesario agregue comentarios descriptivos" rows="5" id="body" class="block mt-1 w-full" name="body" :value="old('body')" required />
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    {{-- rounded-md shadow-sm bg-[#171D2E] border-[#1C6FAC] border-2 focus:border-[#1C6FAC] focus:ring focus:ring-[#1C6FAC] focus:ring-opacity-50 text-white focus:bg-[#212940] color-white' --}}
                    <div>
                        <select class="js-example-basic-multiple
                        
                        " name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
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
    @section('script')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
</x-app-layout>