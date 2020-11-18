@extends('appbase')
@section('header')
<div class = "text-center bg-primary mb-2">REGISTRATION</div>
@stop()
@section('body')
<form action = "{{url('/SignUp')}}" method = "post" enctype = "multipart/form-data">
 {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">User Name</label>
      <small class = "text-danger">{{$errors->first('username')}}</small>
      <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <small class = "text-danger">{{$errors->first('email')}}</small>
      <input type="email" class="form-control" name="email" placeholder="email">
    </div>
  </div>
  
  <div class="form-row">
   <div class = "form-group col-md-6">
    <label for="password">Password</label>
    <small class = "text-danger">{{$errors->first('password')}}</small>
    <input type="password" class="form-control" name="password" placeholder="******">
  </div>
  <div class="form-group col-md-6">
    <label for="confirmpassword">Confirm Password</label>
    <small class = "text-danger">{{$errors->first('confirmpassword')}}</small>
    <input type="password" class="form-control" name="confirmpassword" placeholder="******">
  </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="gender">Gender</label>
      <small class = "text-danger">{{$errors->first('gender')}}</small>
      <select class="form-control" name="gender">
              <option>Male</option>
              <option>Female</option>
              </select><br>
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <small class = "text-danger">{{$errors->first('stateoforigin')}}</small>
      <select class="form-control" name="stateoforigin">
                      <option>Abia</option>
                      <option>Adamawa</option>
                      <option>Akwa Ibom</option>
                      <option>Anambra</option>
                      <option>Bauchi</option>
                      <option>Bayelsa</option>
                      <option>Benue</option>
                      <option>Borno</option>
                      <option>Croos River</option>
                      <option>Delta</option>
                      <option>Ebonyi</option>
                      <option>Edo</option>
                      <option>Ekiti</option>
                      <option>Enugu</option>
                      <option>Gombe</option>
                      <option>Imo</option>
                      <option>Jigawa</option>
                      <option>kaduna</option>
                      <option>Kano</option>
                      <option>Katsina</option>
                      <option>Kebbi</option>
                      <option>Kogi</option>
                      <option>Kwara</option>
                      <option>Lagos</option>
                      <option>Nasarawa</option>
                      <option>Niger</option>
                      <option>Ogun</option>
                      <option>Ondo</option>
                      <option>Osun</option>
                      <option>Oyo</option>
                      <option>Plateau</option>
                      <option>River</option>
                      <option>Sokoto</option>
                      <option>Taraba</option>
                      <option>Yobe</option>
                      <option>Zamfara</option>
                    </select>
    </div>
    <div class = "form-group col-md-4">
      <label for="area">Area</label>
      <small class = "text-danger">{{$errors->first('area')}}</small>
      <input type="text" class="form-control" name="area" placeholder = "Ikeja,Agege">
    </div>
    </div>

  <div class="form-row">
  <div class = "form-group col-md-6">
      <label for = "image">Image</label>
      <small class = "text-danger">{{$errors->first('image')}}</small>
      <input type = "file" class = "form-control-file alert alert-secondary" name = "image" placeholder = "">
  </div>
  <div class="form-group col-md-6">
      <label for="tertiaryeducation">Tertiary Institution</label>
      <small class = "text-danger">{{$errors->first('tertiaryeducation')}}</small>
      <input type = "text" class = "form-control" name = "tertiaryeducation" placeholder = "University,polytechnic etc..">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
@stop()