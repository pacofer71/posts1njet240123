<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="my-2 text-xl text-center">Nuevo Post</h5>
            <div class="p-4 bg-gray-200 rounded-3xl shadow-2xl mx-auto w-1/2">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-jet-label id="titulo" class="mb-2">Título</x-jet-label>
                    <x-jet-input class="w-full p-2" name="titulo" id="titulo" placeholder="Título..." value="{{old('titulo')}}" />
                    <x-jet-input-error for="titulo" /> 
                    <x-jet-label id="contenido" class="my-2">Contenido</x-jet-label>
                    <textarea name="contenido" rows='4' class="w-full" placeholder="Contenido...">{{old('contenido')}}</textarea>
                    <x-jet-input-error for="contenido" /> 
                    <x-jet-label id="" class="my-2">Estado</x-jet-label>
                    <div class="flex">
                        <div class="form-check form-check-inline mr-4">
                            <input @checked(old('estado')=='Publicado')
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="estado" id="inlineRadio1" value="Publicado">
                            <label class="form-check-label inline-block text-gray-800"
                                for="inlineRadio10">Publicado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input @checked(old('estado')=='Borrador')
                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="estado" id="inlineRadio2" value="Borrador">
                            <label class="form-check-label inline-block text-gray-800"
                                for="inlineRadio20">Borrador</label>
                        </div>
                        
                    </div>
                    <x-jet-input-error for="estado" /> 
                    <x-jet-label for="imagen" class="my-2">Imagen</x-jet-label>
                    <input name="imagen"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                                rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        type="file" id="imagen" accept="image/*" />
                        <x-jet-input-error for="imagen" /> 
                    <div class="my-2">
                        <img src="{{ Storage::url('noimage.jpg') }}" class="w-1/2 object-cover object-center" alt="No Image"
                            id="img" />
                    </div>
                    <div class="flex flex-row-reverse">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-save"></i> Guardar</button>
                        <a href="{{ route('dashboard') }}"
                            class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>


    </div>

</x-app-layout>
