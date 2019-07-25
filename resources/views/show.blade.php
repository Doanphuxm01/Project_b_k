@extends('layout')

@section('content')
<div class="card" style="width: 18rem;">
	@foreach($posts as $post)
		
		  <img class="card-img-top" src="http://via.placeholder.com/350x150?text={{ $post->author }}" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title">{{ $post->name }}</h5>
		    <p class="card-text">{{ $post->detail }}</p>
		    <a href="{{ action('PostController@index') }}" class="btn btn-primary">Way Back Home</a>
		  </div>
		
	@endforeach
</div>
@endsection