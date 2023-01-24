<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex flex-row-reverse mb-2">
            <a href="{{route('posts.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-add"></i> Nuevo

            </a>
        </div>
          @if($posts->count())
            
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full">
                        <thead class="bg-white border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              INFO
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              TÍTULO
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              ESTADO
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              ACCIONES
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $item)
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{route('posts.show', $item)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-info"></i>
                                </a>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              {{$item->titulo}}
                            </td>
                            <td  class="whitespace-nowrap">
                              <p class="text-sm text-center w-2/4 @if($item->estado=='Publicado') text-green-600 bg-blue-300 @else text-red-900 bg-red-200 @endif rounded  px-6 py-4">
                                {{$item->estado}}
                              </p>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              <form method="POST" action="{{route('posts.destroy', $item)}}">
                                @csrf
                                @method("DELETE")
                                <a href="{{route('posts.edit', $item)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button input type="submit" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                   <i class="fas fa-trash"></i> 
                                </button>
                    
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="mt-2">
                        {{$posts->links()}}
                    </div>
                  </div>
                </div>
              </div>
              @else
                  <p class="mt-2 text-gray-600 font-semibold px-2 py-2 bg-teal-100 txt-xl rounded-lg">
                    Aún no tiene ningún post, es el momento de crear el primero.
                  </p>
              @endif
            </div>
    </div>
</x-app-layout>
