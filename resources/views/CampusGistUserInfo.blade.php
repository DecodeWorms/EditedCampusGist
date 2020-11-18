@extends('appbase')
@section('header')
<div class = "bg-primary text-center">Suggested Users<div>
@stop()
@section('body')

@foreach($result as $row)
<div class = "">
         <img src = "{{$row['image']}}" style="width: 55px; height:55px;" class="img-circle ml-4 mt-3"><br>
         <form action="{{url('/fullInformation')}}" method="get">
         {{csrf_field()}}
          <input type="hidden" class="form-control" placeholder="" name="searchId" value="{{$row['id']}}">
          <input type="submit" name="click" class="btn btn-danger ml-1 mt-1" value = "{{$row['user_name']}}">
        </form>

    </div>
    <hr>
    @endforeach()
@stop()