@extends('layout')

@section('content')

@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
@endif
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		<a style="float:right" class="btn btn-primary" href="{{ action('PostController@create') }}">add data</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>stt</th>
						<th>id</th>
						<th>name</th>
						<th>detail</th>
						<th>author</th>
						<th>option</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post => $value)
						<tr>
							<td>{{ $post+1 }}</td>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->detail }}</td>
							<td>{{ $value->author }}</td>
							<td>
								<form action="{{ action('PostController@destroy',$value->id) }}" method="POST">
									<a  class="btn btn-info" href="{{ action('PostController@show',$value->id) }}">show</a>
									<a class="btn btn-warning" href="{{ action('PostController@edit',$value->id) }}">Edit</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection