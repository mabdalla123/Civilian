<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RealEstate Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class=" p-2">
                            <form action="{{ route('realestate.create') }}">
                            <x-jet-button class="ml-4">
                                {{ __('Add a RealEstate') }}
                            </x-jet-button>
                        </form>
                        </div>
                      <div class="w-full ">
                        <table class="w-full">
                          <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                              <th class="px-4 py-3"></th>
                              <th class="px-4 py-3">name</th>
                              <th class="px-4 py-3">Description</th>
                              <th class="px-4 py-3">Real E-state Type</th>
                              <th class="px-4 py-3"></th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                              @forelse ($realestates as $realestate)
                                  
                              <tr class="text-gray-700">
                                 <td class="px-4 py-3 border">
                               <form action="{{ route('realestate.destroy',$realestate) }}" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <x-jet-danger-button class="ml-4" type="submit" onclick="return confirm('Are You Sure?')">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                    </x-jet-danger-button>
                               </form>
                                   
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $realestate->name  }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $realestate->description  }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $realestate->type->type_name  }}</td>
                                <td class="px-4 py-3 text-xs border">
                                    <form action="{{ route('realestate.edit',$realestate) }}" method="get">
                                            <x-jet-button class="ml-4" type="submit" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                  </svg>
                                            </x-jet-button>
                                       </form>
                                </td>
                            </tr>
                            @empty
                                
                            <tr class="text-gray-700">
                              <td  class="px-4 py-3 text-xs border">
                                </td>
                                <td colspan="3" class="px-4 py-3 text-md font-semibold border  text-center ">No Data To Show!!!</td>
                                <td class="px-4 py-3 text-xs border">
                                </td>
                            </tr>
                            @endforelse
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</x-app-layout>
