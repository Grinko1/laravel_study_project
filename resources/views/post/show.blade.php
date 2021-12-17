@extends('layouts.main')
@section('content')
  
  <div>{{$post->id}}.{{$post->title}}</div>
  <div>{{$post->content}}</div>

  <div>
  <a class="btn btn-primary mt-3" href="{{route('post.index')}}">Back</a>
  </div>
  <a class="btn btn-info mt-3" href="{{route('post.edit', $post->id)}}">Update</a>

  <form class="mt-3" action="{{route('post.delete', $post->id)}}" method="post">
  @csrf
  @method('delete')
  <input class="btn btn-danger" type="submit" value="Delete">
  </form>

 

@endsection