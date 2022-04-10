<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Employee') }}
        </h2>
		<a href="/dashboard" >Go to Company Dashboard</a>
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
                    <form action="{{url('employee_insert')}}" method="post"enctype="multipart/form-data">
					 @csrf
					 <div class="form-group">
						<label>First Name:</label>
						<input type="text" class="form-control" name="first_name"onkeypress="if ( !isNaN( String.fromCharCode(event.keyCode))) return false;">
					  </div>
					  <div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" name="last_name"onkeypress="if ( !isNaN( String.fromCharCode(event.keyCode))) return false;">
					  </div>
					  <div class="form-group">
						<label>Company Name:</label>
						@isset($company)
						<select name="company" class="form-control">
						<option>--Select Company--</option>
							@foreach($company as $c)
							<option value="{{ $c->name }}">{{ $c->name }}</option>
							@endforeach
						</select>
						@endisset
						
					  </div>
					  <div class="form-group">
						<label >Email address:</label>
						<input type="text" class="form-control" name="email">
					  </div>
					  <div class="form-group">
						<label>Phone:</label>
						
						<input type="text" class="form-control" name="phone"onkeypress="if ( isNaN( String.fromCharCode(event.keyCode))) return false;">
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
						<th>First Name</th>
						<th>Last Name</th>
						<th>Company Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					  </tr>
					</thead>
					@isset($employee)
					<tbody>
					@foreach($employee as $list)
					  <tr>
						<td>{{$list->id}}</td>
						<td>{{$list->first_name}}</td>
						<td>{{$list->last_name}}</td>
						<td>{{$list->company}}</td>
						<td>{{$list->email}}</td>
						<td>{{$list->phone}}</td>
						
						
						<td>
							<a href="emp_delete/{{ $list->id }}" class="btn btn-danger">Delete</a>
							<a href="emp_edit/{{ $list->id }}" class="btn btn-info">Edit</a>					
					    </td>
						
					
						
					  </tr>
					 @endforeach
					</tbody>
					@endisset
				  </table>
				   {!! $employee->links() !!}
				  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
