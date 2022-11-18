<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1C6FBC] overflow-hidden sm:rounded-t-lg">
                <div class="py-4 px-6 bg-[#1C6FAC] text-white text-lg">
                    Nueva publicación
                </div>
                <div class="p-6 bg-[#212940]">
                    <form action="{{route('posts.store', $post)}}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input placeholder="Agregue un nombre descriptivo a su porción de código" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
    
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Porción de código')" />
                            <x-textarea-input placeholder="Ingrese su porción de código y de ser necesario agregue comentarios descriptivos" rows="5" id="body" class="block mt-1 w-full" name="body" :value="old('body')" required />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
    
                        <div class="mt-4">
                            <x-input-label class="mb-1" for="tags" :value="__('Etiquetas')" />
                            <select style="width: 100%" class="tags" id="tags" name="tags[]" multiple="multiple" required>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>
    
                        <div class="mt-5">
                            <x-primary-button class="sm:w-1/5 justify-center">
                                {{ __('Save') }}
                            </x-primary-button>          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                $('#tags').select2({
                    placeholder: "Seleccione algunas etiquetas",
                    tags: true,
                    tokenSeparators: [',', ' ', ';', '|', '&'],
                    createTag: function (params) {
                        var term = $.trim(params.term.toLowerCase());                        
                        if (term === '') {
                            return null;
                        }
                        
                        if(/[,;|&]/.test(params.term)){
                            $('#tags').data('select2').selection.$search.val('');
                        }
                        //term = term.replace(/[,;|&]/, '');
                        return {
                            id: term,
                            text: term,
                        }
                    },
                }).on('select2:select', function (e) {
                    // Check if the new tag contains at least letters or numbers
                    // If it doesn't contains then the new tag will not be created by removing it from the list of selected options
                    if(!/[a-z0-9]/i.test(e.params.data.text)){                        
                        $('#tags option:last-child').remove();
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>