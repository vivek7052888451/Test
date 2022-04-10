<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
		
            {{ __(' Dashboard') }}
			
        </h2>
		<a href="/employee" >Go to employee Dashboard</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
					@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
                </div>
				  @if ($errors->any())
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				
            </div>
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{url('insert')}}" method="post"enctype="multipart/form-data">
					
					 @csrf
					 <div class="form-group">
						<label for="pwd">Name:</label>
						<input type="text" class="form-control" name="name">
					  </div>
					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" name="email">
					  </div>
					  <div class="form-group">
						<label for="pwd">logo:</label>
						
						<input type="file" class="form-control" name="logo">
					  </div>
					  
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
            </div>
			
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200" >
				<div class="table-responsive">
                 <table class="table">
					<thead>
					  <tr>
						<th>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Logo</th>
						<th>Action</th>
					  </tr>
					</thead>
					@isset($campanys)
					<tbody>
					@foreach($campanys as $list)
					  <tr>
						<td>{{$list->id}}</td>
						<td>{{$list->name}}</td>
						<td>{{$list->email}}</td>
						<td><img src="/uploads/{{ $list->logo }}" width="100px"></td>
						
						<td><a href="delete/{{ $list->id }}" class="btn btn-danger">Delete</a>
						<a href="edit/{{ $list->id }}" class="btn btn-info">Edit</a>
					    </td>
						
					
						
					  </tr>
					 @endforeach
					</tbody>
					@endisset
				  </table>
				   {!! $campanys->links() !!}
				  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
