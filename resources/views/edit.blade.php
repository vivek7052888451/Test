<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT PAGE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
				
					
                </div>
            </div>
			
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			 @isset($edit_data)
                <div class="p-6 bg-white border-b border-gray-200">
               <form action="{{url('update',$edit_data->id)}}" method="post"enctype="multipart/form-data">
					 
					 @csrf	 
					 <div class="form-group">
						<label for="pwd">Name:</label>
						<!--<input type="hidden" class="form-control" name="id" value="{{$edit_data->id}}">-->
						<input type="text" class="form-control" name="name" value="{{$edit_data->name}}">
						
					  </div>
					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" name="email"value="{{$edit_data->email}}">
					  </div>
					  <div class="form-group">
						<label for="pwd">logo:</label>					
						 <img src="/uploads/{{ $edit_data->logo }}" width="200px">
						<input type="file" class="form-control" name="logo"value="{{$edit_data->logo}}">
					  </div>
					  
					  <button type="submit" class="btn btn-success">Submit</button>
					</form>
					 
                </div>
				 @endisset
            </div>
			
			
			
        </div>
    </div>
</x-app-layout>
