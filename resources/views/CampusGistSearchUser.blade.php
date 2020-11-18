@extends('appbase')
@section('header')
<div class = "bg-primary text-center">Search for a user</div>
@stop()
@section('body')
<div class = "">
         <form action="{{url('/findUser')}}" method="post">
         {{csrf_field()}}
          <input type="text" class="form-control mt-5" placeholder="Type username here" name="username" value="">
          <input type="submit" name="click" class="btn btn-primary ml-1 mt-1 btn-md" value = "Submit">
        </form>

    </div>
    <hr>
   
@stop()