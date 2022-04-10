<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Edit') }}
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
                    <form action="{{url('employee_update')}}" method="post"enctype="multipart/form-data">
					 @csrf
					 <div class="form-group">
						<label>First Name:</label>
						<input type="hidden" class="form-control" name="id" value="{{$edit_data->id}}" >
						<input type="text" class="form-control" name="first_name" value="{{$edit_data->first_name}}" onkeypress="if ( !isNaN( String.fromCharCode(event.keyCode))) return false;">
					  </div>
					  <div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" name="last_name"value="{{$edit_data->last_name}}" onkeypress="if ( !isNaN( String.fromCharCode(event.keyCode))) return false;">
					  </div>
					   <div class="form-group">
						<label>Company Name:</label>
						@isset($company)
						<select name="company" class="form-control">		
							@foreach($company as $c)							
							<option value="{{ $c->name }}"@if($c->name ==  $edit_data->company) selected  @endif>{{ $c->name }}</option>	
							@endforeach
						</select>
						@endisset
						
					  </div>
					  <div class="form-group">
						<label >Email address:</label>
						<input type="text" class="form-control" name="email"value="{{$edit_data->email}}">
					  </div>
					  <div class="form-group">
						<label>Phone:</label>
						
						<input type="text" class="form-control" name="phone"value="{{$edit_data->phone}}" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode))) return false;">
					  </div>
					  
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
					 
                </div>
				 @endisset
            </div>
			
			
			
        </div>
    </div>
</x-app-layout>
