@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
  </ul>
</div><br />
@endif

<form action="{{ route('stories.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Body</label>
        <input type="text" class="form-control" name="body">

      </div>


      <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control">
            <option value="">--Select--</option>
            <option value="short">Short</option>
            <option value="long">Long</option>
        </select>
    </div>

    <div class="form-group">
        <legend><h6>Status</h6></legend>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="1">
            <label for="active" class="form-check-label">Yes</label>
        </div>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="0">
            <label for="active" class="form-check-label">No</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>


@endsection
