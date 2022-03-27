<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Acceptances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class='flex items-center justify-center min-h-screen from-teal-100'>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>
            
                            <form action="{{route('Acceptances.update',$Acceptance)}}" method="POST"  enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <h2 class="text-2xl font-bold ">Update Acceptances</h2>
                                <p class="my-4 opacity-70"></p>
                                <hr class="my-6">
                                 {{-- Select City --}}
                                 <div>
                                    <label class="uppercase text-sm font-bold opacity-70">City </label>
                                   <select name="city_id"  id="" class=" w-full" sele>
                                    <option value="">--select</option>

                                          @foreach ($cities as $city)
                                           <option value="{{ $city->id }}" {{ $Acceptance->city_id==$city->id ?'selected':'' }} >{{ $city->city_name }}</option>
                                            @endforeach
                                  </select>
                                    <br>
                          
                        </div>
                        {{-- End Select City --}}
                         {{--  Add University name  --}}
                          <div>
                            <label class="uppercase text-sm font-bold opacity-70">University Name</label>
                            <input type="text" name="university_name" value="{{ old('university_name')?? $Acceptance->university_name }}"
                                class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                @error('university_name') class="shadow shadow-red-500" @enderror>
                            @error('university_name')
                            <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message }}</label>

                            <br>
                            @enderror
                        </div> 
                        {{-- End University name --}}   
                         {{--  Add Fees  --}}
                          <div>
                            <label class="uppercase text-sm font-bold opacity-70">Fees</label>
                            <input type="text" name="Fees" value="{{ old('Fees') ?? $Acceptance->Fees }}"
                                class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                                @error('Fees') class="shadow shadow-red-500" @enderror>
                            @error('Fees')
                            <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message }}</label>

                            <br>
                            @enderror
                        </div> 
                        {{-- End Fees --}}   
                               

                        {{-- Images --}}
                        <div>
                            <label class="uppercase text-sm font-bold opacity-70">Image</label>
                            <img src="{{ asset('Acceptance/'.$Acceptance->image_path) }}" alt="{{ $Acceptance->university_name }}">
                            <input type="file" name="image_path"
                            class=" shadow-red-500 p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none "
                            @error('image_path') class="shadow shadow-red-500" @enderror>
                            
                            
                            
                            @error('image_path')
                            <label class="uppercase text-sm font-bold   text-red-600 opacity-70">{{ $message }}</label>

                            <br>
                            @enderror
                        </div> 
                        {{-- EndImages --}}
                               <x-jet-button class="" type="submit">
                                {{ __('Update') }}
                            </x-jet-button>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
