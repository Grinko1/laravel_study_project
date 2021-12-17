@extends('layouts.main')
@section('content')
  @foreach($posts as $post)
  <div>{{$post->id}}.{{$post->title}}</div>

  @endforeach
@endsection