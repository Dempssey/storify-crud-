@extends('layouts.app')
@section('content')



<div class="card">
    <div class="card-body">

      <h2>{{ $story->id }}</h2>
      <h2>{{ $story->title }}</h2>
      <p>{{ $story->body }}</p>
      <p>{{ $story->status}}</p>
      <p>{{ $story->type }}</p>
      <td><a href="/stories" class="btn btn-success">Back</a></td>
    </div>
  </div>


@endsection
