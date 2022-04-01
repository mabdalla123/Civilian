<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RealEstate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class='flex items-center justify-center min-h-screen from-teal-100'>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>

                            <form action="{{route('realestate.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-2xl font-bold ">Add new Real Estate Type</h2>
                                <p class="my-4 opacity-70">Here You can Add New real estate type To Select Form </p>
                                <hr class="my-6">
                                <div>
                                    <label class="uppercase text-sm font-bold opacity-70">Real Estate Type</label>
                                    
                                    <select name="real_estate_type_id" id=""
                                    class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none ">
                                    <option value="">--select</option>
                                        @foreach ($realestatetypes as $realestatetype)
                                            <option value="{{ $realestatetype->id }}" {{ $realestatetype->id===old('real_estate_type_id') ? 'selected':'' }}>{{ $realestatetype->type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('real_estate_type_id')
                                    <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message
                                        }}</label>

                                    <br>
                                    @enderror
                                </div>

                                <div>

                                    <label class="uppercase text-sm font-bold opacity-70">Real Estate name</label>
                                    <input type="text" name="name" value="{{ old('name')}}"
                                        class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                        @error('name') class="shadow shadow-red-500" @enderror>
                                    @error('name')
                                    <label class="uppercase text-sm font-bold   text-red-600 opacity-70">
                                        {{ $message }}</label>

                                    <br>
                                    @enderror
                                </div>

                                <div>

                                    <label class="uppercase text-sm font-bold opacity-70">Real Estate Description</label>
                                    
                                        <textarea name="description" id="" cols="30" rows="10"
                                        class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                        value="{{ old('description')}}"></textarea>
                                    @error('description')
                                    <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message
                                        }}</label>

                                    <br>
                                    @enderror
                                </div>
                                <div>

                                    <label class="uppercase text-sm font-bold opacity-70">Real Estate Files</label>
                                    
                                        <textarea name="description" id="" cols="30" rows="10"
                                        class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                        >{{ old('description')}}</textarea> 
                                        @error('description')
                                        <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message }}</label>
                                        <br>
                                        @enderror
                                        <input type="file" name="files[]" multiple 
                                        class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                        >
                                </div>
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