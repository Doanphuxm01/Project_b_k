@extends('layout')
@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			@if($message = Session::get('danger'))
				<div class="alert alert-danger">
					<strong>{{ $message }}</strong>
				</div>
			@endif
			@foreach($posts as $post)
				<form action="{{ action('PostController@update',$post->id) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>name</label>
						<input type="text" name="name" class="form-control" value="{{ $post->name }}">
					</div>
					<div class="form-group">
						<label>detail</label>
						<textarea name="detail" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>author</label>
						<input type="text" name="author" class="form-control" value="{{ $post->author }}">
					</div>
					<button type="submit" class="btn btn-warning">update</button>
					<a href="{{  action('PostController@index') }}" class="btn btn-default">back</a>
				</form>
			@endforeach
		</div>
	</div>
@endsection