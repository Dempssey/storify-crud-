@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                    <strong>{{ $message }}</strong>

            </div>

            @endif

            @if ($message = Session::get('update'))

            <div class="alert alert-info alert-block">

                    <strong>{{ $message }}</strong>

            </div>

            @endif

            @if ($message = Session::get('delete'))

            <div class="alert alert-danger alert-block">

                    <strong>{{ $message }}</strong>

            </div>

            @endif


<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Status</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
        <th><a href="/stories/create" class="btn btn-success">Create</a></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($mystories as $ms )


      <tr>
        <td>{{ $ms->id }}</td>
        <td>{{ $ms->title }}</td>
        <td>{{ $ms->status }}</td>
        <td>{{ $ms->type }}</td>
        <td><a href="{{ route('stories.show',[$ms]) }}" class="btn btn-success">View</a>
        <a href="{{ route('stories.edit',[$ms]) }}" class="btn btn-warning">Update</a>
                <form action="{{ route('stories.destroy',[$ms]) }}" method="post">
                    @method('delete')
                    @csrf

                <button class="btn btn-danger">DELETE</button>

                </form></td>

      </tr>


      @endforeach


    </tbody>
  </table>

  {{ $mystories->links() }}
@endsection
