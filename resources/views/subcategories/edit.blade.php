@extends('layout')
@section('content')
  <h3 class="text-center m-3">Edit Subcategory</h3>
  <form method="POST" action="{{ route('subcategories.update', $subcategory) }}">
    @csrf @method('PUT')

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category_id" id="js-category-select" class="form-control">
            @foreach($categories as $c)
              <option value="{{ $c->id }}" {{ old('category_id', $subcategory->category_id) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
          </select>
          @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input name="name" class="form-control" value="{{ old('name', $subcategory->name) }}">
          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
    
  </form>


  <script>
  $(document).ready(function() {
    $('#js-category-select').select2({
        placeholder: "Select categories", // optional placeholder
        allowClear: true                  // adds X to clear selection
    });
});
</script>
@endsection