@extends('layout')
@section('content')
  <h3>Create Subcategory</h3>
  <form method="POST" action="{{ route('subcategories.store') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Category</label>
      <select name="category_id" class="form-control">
        <option value="">Select</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
        @endforeach
      </select>
      @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" class="form-control" value="{{ old('name') }}">
      @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back</a>
  </form>
@endsection