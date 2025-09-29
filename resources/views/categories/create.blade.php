@extends('layout')
@section('content')
  <h3 class="text-center m-5">Create Category</h3>
  <form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input name="name" class="form-control" value="{{ old('name') }}">
          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </form>
@endsection