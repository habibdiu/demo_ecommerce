@extends('layout')
@section('content')
  <h3>Create Product</h3>
  <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select id="category" name="category_id" class="form-control">
        <option value="">Select</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
      </select>
      @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Subcategory</label>
      <select id="subcategory" name="subcategory_id" class="form-control">
        <option value="">Select</option>
      </select>
      @error('subcategory_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" class="form-control" value="{{ old('name') }}">
      @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
      @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Image (optional)</label>
      <input type="file" name="image" class="form-control">
      @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Old Price (optional)</label>
        <input name="old_price" class="form-control" value="{{ old('old_price') }}">
        @error('old_price') <div class="text-danger">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">New Price</label>
        <input name="new_price" class="form-control" value="{{ old('new_price') }}">
        @error('new_price') <div class="text-danger">{{ $message }}</div> @enderror
      </div>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
  </form>
@endsection

@push('js')
<script>
    let categories = @json($categories);

    document.getElementById('category').addEventListener('change', function () {
        let categoryId = this.value;
        let subcategorySelect = document.getElementById('subcategory');

        
        subcategorySelect.innerHTML = '<option value="">Select</option>';

        if (categoryId) {
            let selectedCategory = categories.find(cat => cat.id == categoryId);
            if (selectedCategory && selectedCategory.subcategories.length > 0) {
                selectedCategory.subcategories.forEach(sub => {
                    let opt = document.createElement('option');
                    opt.value = sub.id;
                    opt.textContent = sub.name;
                    subcategorySelect.appendChild(opt);
                });
            }
        }
    });
</script>
@endpush
