@extends('appbase')
@section('body')
@foreach($results as $row)
<div class = "container-fluid">
  
       <div class = "">
           <p><b>{{$row['user_name']}}</b>  {{$row['comment']}}</P>
       </div>
       <hr>
  </div>
@endforeach()
  <div class = "container-fluid">
  
      <form action = "{{url('/postViewComment')}}" method = "post">
      {{csrf_field()}}
      @foreach($getUsername as $row)
           <label for = "comment" class ="form-label"><b><i>{{$row['user_name']}}</i></b></label>
           @endforeach()
           <input type = "text" class = "form-control" name = "comment" placeholder = "Writes here..."><br>
           <button type = "" class = "btn btn-secondary">post</button>
      </form>
  </div>
 
@stop()