@extends('layouts.main')
@section('content')


<div>
<form action="{{route('post.store')}}" method="POST">
@csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="title">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content"  placeholder="Content">
    </textarea>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="text" name="image" class="form-control" id="image"  placeholder="image">
  </div>
 

<div class="margin-top-6">
<br/>

</div>
  <button type="submit" class="btn btn-primary ">Create</button>
  
</form>
</div>
@endsection