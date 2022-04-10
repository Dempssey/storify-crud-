@extends('layouts.app')
@section('content')



<form action="{{  route('stories.update',$story->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" value="{{ $story->title }}">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Body</label>
        <input type="text" class="form-control" name="body" value="{{ $story->body }}">

      </div>

      <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control">
            <option value="">{{ $story->type}}</option>
            <option value="short">Short</option>
            <option value="long">Long</option>
        </select>
    </div>

    <div class="form-group">
        <legend><h6>Status</h6></legend>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="{{ $story->status }}">
            <label for="active" class="form-check-label">Yes</label>
        </div>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="{{ $story->status }}">
            <label for="active" class="form-check-label">No</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>


@endsection
