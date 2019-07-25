<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="assets/admin/css/login.css">
	<link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="content">
  <div id="signup_overlay" class="card">
  </div>
  <div id="login">
    <form action="{{ route('postLogin') }}" method="POST">
    	{{ csrf_field() }}
	    <div class="form">
	    		<img src="{{ asset('assets/admin/img/deha-software-logo.svg') }}">
	      		<h3>Login</h3>
					@if($errors->has('errorlogin'))
						<div class="alert alert-danger">
							<i class="fas fa-times"></i>
							{{$errors->first('errorlogin')}}
						</div>
					@endif
		      	<input id="email" name="email"type="text"placeholder="name"/ value="{{old('email')}}">
		      	@if($errors->has('email'))
							<span class="erro_x1">{{$errors->first('email')}}</span>
						@endif
		      	<input id="password" name="password" type="password" placeholder="Password" />
				@if($errors->has('password'))
							<span class="erro_x1">{{$errors->first('password')}}</span>
						@endif
		      	<button class="buttonx2" type="submit"><i class="fas fa-key"></i>Đăng nhập</button>
	    </div>
    </form>
  </div>
  <div id="signup"></div>
</div>
</body>
</html>