@extends('layouts.main')
@section('content')
<div>
<div><a class="btn btn-primary mb-3" href="{{route('post.create')}}">Create a new post</a></div>
@foreach($posts as $post)
  <div><a href={{route('post.show', $post->id)}}><b>{{$post->id}}.{{$post->title}}</b></a></div>

  @endforeach
</div>
@endsection