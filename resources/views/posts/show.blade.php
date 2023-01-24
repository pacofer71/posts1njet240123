<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="my-2 text-xl text-center">Detalle Post</h5>
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <div>
                        <img class="rounded-t-lg object-cover object-center w-full" src="{{Storage::url($post->imagen)}}"
                            alt="" />
                    </div>
                    <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">{{$post->titulo}}</h5>
                        <p class="text-gray-700 text-base mb-4">
                            {{$post->contenido}}
                        </p>
                        <p class="text-gray-700 text-base mb-4">
                            <span class="font-bold">Creado : </span>{{$post->created_at->format('d-m-Y (h:i:s)')}}
                        </p>
                        <p class="text-gray-700 text-base mb-4">
                            <span class="font-bold">Editado : </span>{{$post->updated_at->format('d-m-Y (h:i:s)')}}
                        </p>
                        <p class="text-base mb-4">
                            <span class="font-bold">Estado : </span><span class="@if($post->estado=='Publicado') text-green-600 @else text-red-600 @endif">{{$post->estado}}</span>
                        </p>
                        <a href="{{route('dashboard')}}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-backward"></i> Volver
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
