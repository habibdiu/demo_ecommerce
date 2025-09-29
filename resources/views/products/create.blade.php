@extends('layout')
@section('content')
  <h3 class="text-center m-3">Create Product</h3>
  <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Category</label>
          <select id="category" name="category_id" class="form-control js-select2" required>
            <option value="">Select</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
          </select>
          @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">Subcategory</label>
          <select id="subcategory" name="subcategory_id"  class="form-control js-select2" required>
            <option value="">Select</option>
          </select>
          @error('subcategory_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Name</label>
          <input name="name" class="form-control" value="{{ old('name') }}" required>
          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Old Price</label>
          <input name="old_price" class="form-control" value="{{ old('old_price') }}">
          @error('old_price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">New Price</label>
          <input name="new_price" class="form-control" value="{{ old('new_price') }}" required>
          @error('new_price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4 mb-4">
          <label class="form-label">Image</label>  
          <input type="file" name="image" class="form-control">
          @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="col-md-8 mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="6">{{ old('description') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
        
        <button class="btn btn-success">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </div>
  </form>
@endsection

@push('js')
<script>
$(document).ready(function() {

    // Dynamic subcategory loading
    let categories = @json($categories);

    $('#category').on('change', function() {
        let categoryId = this.value;
        let subcategorySelect = $('#subcategory');

        // Clear old options
        subcategorySelect.html('<option value="">Select</option>');

        if (categoryId) {
            let selectedCategory = categories.find(cat => cat.id == categoryId);
            if (selectedCategory && selectedCategory.subcategories.length > 0) {
                selectedCategory.subcategories.forEach(sub => {
                    let opt = $('<option></option>')
                        .val(sub.id)
                        .text(sub.name);
                    subcategorySelect.append(opt);
                });
            }
        }
    });

});
</script>
@endpush

