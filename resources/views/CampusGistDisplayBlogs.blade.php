@extends('appbase')
@section('header')
<nav class = "nav justify-content-center">
<a class = "nav-link" href = "{{url('/home')}}">HOME</a>
<a class = "nav-link" href = "{{url('/myProfile')}}">MY PROFILE</a>
<a class = "nav-link" href = "{{url('/searchUser')}}">SEARCH USER</a>
<a class = "nav-link" href = "{{url('/logout')}}">LOG OUT</a>
</nav>
@stop()
@section('body')
    <div class="card">
    @foreach($userpost as $row)
    
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
      <form action ="{{url('/postcomment')}}" method="post">
       {{csrf_field()}}
     <input type="text" class="form-control" placeholder="" name="comment" value=""  placeholder = "Add comment here..">
     <input type="hidden" class="form-control" placeholder="" name="PostidNumber" value="{{$row['id']}}">
     <input type = "submit" class="btn btn-secondary mt-1" name = "postMessage">
     </form>

     </div>
     @endforeach


  </div>
@stop()
