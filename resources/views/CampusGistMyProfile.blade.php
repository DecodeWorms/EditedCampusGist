@extends('appbase')
@section('body')
@section('header')
<nav class = "nav justify-content-center">
<a class = "nav-link" href = "{{url('/home')}}">HOME</a>
<a class = "nav-link" href = "{{url('/myProfile')}}">MY PROFILE</a>
<a class = "nav-link" href = "{{url('/searchUser')}}">SEARCH USER</a>
<a class = "nav-link" href = "{{url('/logout')}}">LOG OUT</a>
</nav>
<div class = "bg-primary text-center mb-5">MY PROFILE</div>
@stop()
@foreach($getUsername as $row)
<div class = "card">
           <div class = "card-header bg-primary text-center text-white"><a href = "{{url('/editProfile')}}" class="text-white" style="text-decoration:none;">EDIT PROFILE</a></div>
           </div>
           <div class = "card-body">
           <img src="{{$row['image']}}" style="width: 100px; height:100px;" class="img-circle"><br><br>
               <label for = "full name" class = "form-label"><b><i>User Name : {{$row['user_name']}}</b></i></label><br><br>
               <label for = "Email" class = "form-label"><b><i>User Email : {{$row['email']}}</b></i></label>
           </div>
       </div>
       @endforeach()
       <hr>


       <div class="card">
    @foreach($userPost as $row)

    
      <div class="card-header bg-primary text-white">
           <img src="{{$row['user_image']}}" style="width: 50px; height:50px;" class="img-circle ml-1 mt-3"><span class="ml-3" ><b>{{$row['user_name']}}</b></span>
      </div>

      <div class="card-body">
        <img src="{{$row['post_image']}}">
    
      <div class="card-title mt-2"><p><b>{{$row['user_name']}}</b> {{$row['description']}}</p></div>

      <form action="{{url('/fetchComment')}}" method="post">
      {{csrf_field()}}
      <input type="hidden" class="form-control" placeholder="" name="viewComment" value="{{$row['id']}}">
      <input type="submit" name="" value="view all comments " class="btn btn-sm mb-2"><br>
       {{$row['post_time']}}

     </form>
      <form action ="{{url('/myProfilePostcomment')}}" method="post">
       {{csrf_field()}}
     <input type="text" class="form-control" placeholder="" name="comment" value=""  placeholder = "Add comment here..">
     <input type="hidden" class="form-control" placeholder="" name="PostidNumber" value="{{$row['id']}}">
     <input type = "submit" class="btn btn-secondary mt-1" name = "postMessage">
     </form>

     </div>
     @endforeach



@stop()