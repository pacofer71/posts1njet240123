<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="my-2 text-xl text-center">Formulario de Contacto</h5>
            <div class="p-4 bg-gray-200 rounded-3xl shadow-2xl mx-auto w-1/2">
                <form action="{{route('contact.send')}}" method="POST">
                    @csrf
                    <x-jet-label id="nombre" class="mb-2">Nombre</x-jet-label>
                    <x-jet-input class="w-full p-2" name="nombre" id="titulo" placeholder="Nombre..." value="{{old('nombre')}}" />
                    <x-jet-input-error for="nombre" /> 
                    <x-jet-label id="email" class="my-2">Email</x-jet-label>
                    <x-jet-input class="w-full p-2" name="email" id="email" type="email" placeholder="Email..." value="{{old('email')}}" />
                    <x-jet-input-error for="email" /> 
                    <x-jet-label id="mensaje" class="my-2">Mensaje</x-jet-label>
                    <textarea name="mensaje" rows='4' class="w-full" placeholder="Mensaje...">{{old('mensaje')}}</textarea>
                    <x-jet-input-error for="mensaje" /> 
                    <div class="mt-2 flex flex-row-reverse">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-save"></i> Enviar</button>
                        <a href="{{ route('dashboard') }}"
                            class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>