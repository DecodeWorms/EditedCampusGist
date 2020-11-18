@extends('appbase')
@section('body')
@section('header')
<nav class = "nav justify-content-center">
<a class = "nav-link" href = "{{url('/home')}}">HOME</a>
<a class = "nav-link" href = "{{url('/myProfile')}}">MY PROFILE</a>
<a class = "nav-link" href = "{{url('/searchUser')}}">SEARCH USER</a>
<a class = "nav-link" href = "{{url('/logout')}}">LOG OUT</a>
</nav>
<div class="bg-secondary text-white text-center">EDIT PROFILE<br>CHANGE USER NAME</div>
@stop()
<div class="conatiner">
   <div class="card mt-3" id="regCard">
     <div class="card-body">
         <form action="{{url('/editProfile')}}" method="get">
         {{csrf_field()}}
              <label for="name" class="form-label">User Name </label>
              <input type="text" class="form-control" name="name" ><br>
              <label for="username" class="form-label">New User name</label>
              <input type="text" class="form-control" name="newusername" placeholder="Enter new user name"><br>
              <input type = "submit" class="btn btn-secondary btn-lg btn-block mt-1" name = "submit">
        </form>
       </div>
    </div>
 </div>
@stop()