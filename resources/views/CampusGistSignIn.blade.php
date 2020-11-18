@extends('appbase')
@section('body')
<nav class = "bg bg-primary text-center text-white ">SIGN IN</nav>
<form action = "{{url('/login')}}" method = "POST">
 {{csrf_field()}}

 <div class="form-row">
    <div class="form-group col-md-12">
      <label for="email">Email</label>
      <small class = "text-danger">{{$errors->first('email')}}</small>
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    </div>
    <div class = "form-row">
    <div class="form-group col-md-12">
      <label for="description">Password</label>
      <small class = "text-danger">{{$errors->first('password')}}</small>
      <input type="password" class="form-control" name="password" placeholder="*******">
  </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
 </form>
 <a href = "{{url('/signup')}}">
 <button type = "submit" class = "btn btn-primary btn-lg btn-block">Have You Registered?</button>
 </a>
 @stop()