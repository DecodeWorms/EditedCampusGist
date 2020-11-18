@extends('appbase')
@section('body')
<nav class = "bg bg-primary text-center text-white">Add Post</nav>
<form action = "{{url('/collectPost')}}" method = "Post" enctype = "multipart/form-data">
 {{csrf_field()}}
 <div class="form-row">
    <div class="form-group col-md-12">
      <label for="title">Title</label>
      <small class = "text-danger">{{$errors->first('title')}}</small>
      <input type="text" class="form-control" name="title" placeholder="Post Title">
    </div>
    </div>
    <div class = "form-row">
    <div class="form-group col-md-12">
      <label for="description">Description</label>
      <small class = "text-danger">{{$errors->first('description')}}</small>
      <textarea type="text" class="form-control" name="description" placeholder="Describe the post here..." col = 50 row = "" >Type here</textarea>
  </div>
    </div>
    <div class = "form-row">
      <div class = "form-group col-md-12">
      <label for = "image">Post Image</label>
      <small class = "text-danger">{{$errors->first('image')}}</small>
      <input type = "file" class = "form-control-file alert alert-secondary" name = "image" placeholder = "">
  </div>
  </div>
    <button type="submit" class="btn btn-primary">Save Post</button>
 </form>
@stop()