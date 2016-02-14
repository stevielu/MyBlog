@extends('layouts.default')
@section('header')
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<style>
	#contact{
    width: 100%;
    height:150px;
    background-color: #F9F9F7;
    position: absolute;
    bottom: 0;
}
</style>
@endsection
@section('body')
<div class = "extraspace-large"></div>
<div class="container" >
	<div class = 'row'>
		<form class="form-horizontal center" method = 'post' action = 'login'>
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			@if($loginStauts == 'fail')
			<div class = "alert alert-danger" role="alert" data-alert = "login-alert" style="display:block">
                    Wrong Account or Password!
            </div>
            @endif
			  <div class="form-group">
			    <label for="inputEmail3" class="col-xs-3 control-label">Account</label>
			    <div class="col-xs-8">
			      <input type="text" class="form-control" id="inputEmail3" name = 'name' placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-xs-3 control-label">Password</label>
			    <div class="col-xs-8">
			      <input type="password" class=" form-control" id="inputPassword3" name = 'password' placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-xs-6">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Remember me
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-xs-3 center ">
			      <button type="submit" class="btn btn-default">Sign in</button>
			    </div>
			  </div>
		</form>
	</div>
<div class = "extraspace-large"></div>
</div>
@endsection