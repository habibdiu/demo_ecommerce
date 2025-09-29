@extends('layout')
@section('content')
  <h3 class="text-center m-3">Edit Category</h3>
  <form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf @method('PUT')
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input name="name" class="form-control" value="{{ old('name', $category->name) }}">
          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </form>
@endsection