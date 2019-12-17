<!DOCTYPE html>
<html>
<head>
	<title>Create User Account</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
   		.box{
    	width:600px;
    	margin:0 auto;
    	border:1px solid #ccc;
   	}
  	</style>
</head>
<body>
	<div class="container box">
		<h3 align="center">Simple Registration System in Laravel</h3><br />

   		<form method="post" action="{{ url('/createUser') }}">
    	{{ csrf_field() }}
    		<div class="form-group">
     			<label>Enter Username</label>
     			<input type="text" name="name" class="form-control" />
    		</div>
    		<div class="form-group">
     			<label>Enter Email</label>
     			<input type="text" name="email" class="form-control" />
    		</div>
    		<div class="form-group">
     			<label>Enter Password</label>
     			<input type="password" name="password" class="form-control" />
    		</div>
    		<div class="form-group">
     			<input type="submit" name="login" class="btn btn-primary" value="Sign Up" />
    		</div>
    		<input type="hidden" name="updated_at" value="{{date('Y-m-d H:i:s')}}">
    		<input type="hidden" name="created_at" value="{{date('Y-m-d H:i:s')}}">
   		</form>
	</div>
</body>
</html>