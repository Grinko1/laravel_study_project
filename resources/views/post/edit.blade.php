@extends('layouts.main')

@section('content')
<div>
<form action="{{route('post.update', $post->id)}}" method="POST">
@csrf
@method('patch')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" placeholder="title">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content"  placeholder="Content">{{$post->content}}</textarea>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}" placeholder="image">
  </div>



<div class="margin-top-6">
<br/>

</div>
  <button type="submit" class="btn btn-primary ">Update</button>
  
</form>
</div>
@endsection
 