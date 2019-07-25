@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		@if($message = Session::get('danger'))
		<div class="alert alert-danger">
			<strong>{{ $message }} </strong>
		</div>
		@endif
		<form action="{{ action('PostController@store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label class="badge badge-success">name</label>
				<input  class="form-control" type="text" name="name" placeholder="name">
			</div>
			<div class="form-group">
				<label class="badge badge-success">detail</label>
				<textarea class="form-control"  name="detail" placeholder="detail"></textarea> 
			</div>
			<div class="form-group">
				<label class="badge badge-success">author</label>
				<input class="form-control" type="text" name="author" placeholder="author">
			</div>
			<button  class="btn btn-primary" type="submit">add</button>
		</form>
	</div>
</div>
	
@endsection