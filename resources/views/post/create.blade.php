@extends('layouts.main')
@section('content')


<div>
<form action="{{route('post.store')}}" method="POST">
@csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title" placeholder="title">
    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content"  placeholder="Content">{{old('content')}}
    </textarea>
    @error('content')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="text" value="{{old('image')}}" name="image" class="form-control" id="image"  placeholder="image">
    @error('image')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="form-group">
  <label for="category">Category</label>
  <select class="form-select" id="category" name="category_id">
    @foreach($categories as $category)
    <option
    {{old('category_id') == $category->id ? 'selected' : ''}}
     value="{{$category->id}}">{{$category->title}}</option>
    @endforeach

</select>
  </div>

  <div class="form-group">
  <label for="tags">Tags</label>

  <select class="form-select" multiple id="tags" name="tags[]">
    @foreach($tags as $tag)
  <option
  
 
   value="{{$tag->id}}">{{$tag->title}}</option>
  @endforeach

</select>
  </div>
 

<div class="margin-top-6">
<br/>

</div>
  <button type="submit" class="btn btn-primary ">Create</button>
  
</form>
</div>
@endsection