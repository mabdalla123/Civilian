<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RealEstate Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class='flex items-center justify-center min-h-screen from-teal-100'>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>
            
                            <form action="{{route('realestatetypes.store')}}" method="POST" class="">
                                @csrf
                                <h2 class="text-2xl font-bold ">Add new Real Estate Type</h2>
                                <p class="my-4 opacity-70">Here You can Add New real estate type To Select Form </p>
                                <hr class="my-6">
                                <label class="uppercase text-sm font-bold opacity-70">Real Estate Type</label>
                                <input type="text" name="type_name" value="{{ old('type_name')}}" class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                @error('type_name')
                                    class="shadow shadow-red-500"
                                @enderror
                                >
                               @error('type_name')
                                <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message }}</label>
                                   
                                <br>
                               @enderror
                               
                               <x-jet-button class="" type="submit">
                                {{ __('Add') }}
                            </x-jet-button>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
