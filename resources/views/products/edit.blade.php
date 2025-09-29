@extends('layout')
@section('content')
<h3 class="text-center m-3">Edit Product</h3>
<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <!-- Category Dropdown -->
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select id="category" name="category_id" class="form-control">
            <option value="">Select category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- Subcategory Dropdown -->
    <div class="mb-3">
        <label class="form-label">Subcategory</label>
        <select id="subcategory" name="subcategory_id" class="form-control">
            <option value="">Select subcategory</option>
        </select>
        @error('subcategory_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name', $product->name) }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="form-label">Image (optional)</label>
        @if($product->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $product->image) }}" style="height:120px;object-fit:cover;">
            </div>
        @endif
        <input type="file" name="image" class="form-control">
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <!-- Prices -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Old Price (optional)</label>
            <input name="old_price" class="form-control" value="{{ old('old_price', $product->old_price) }}">
            @error('old_price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">New Price</label>
            <input name="new_price" class="form-control" value="{{ old('new_price', $product->new_price) }}">
            @error('new_price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection

@push('js')
<script>
    let categories = @json($categories);
    let subcategorySelect = document.getElementById('subcategory');
    let categorySelect = document.getElementById('category');
    let oldSubcategoryId = '{{ old("subcategory_id", $product->subcategory_id) }}';

    function populateSubcategories(selectedCategoryId, selectedSubId = null) {
        subcategorySelect.innerHTML = '<option value="">Select subcategory</option>';
        if (!selectedCategoryId) return;

        let selectedCategory = categories.find(cat => cat.id == selectedCategoryId);
        if (selectedCategory && selectedCategory.subcategories.length > 0) {
            selectedCategory.subcategories.forEach(sub => {
                let opt = document.createElement('option');
                opt.value = sub.id;
                opt.textContent = sub.name;
                if (sub.id == selectedSubId) opt.selected = true;
                subcategorySelect.appendChild(opt);
            });
        }
    }

    // Populate on page load for edit
    populateSubcategories(categorySelect.value, oldSubcategoryId);

    // Populate on category change
    categorySelect.addEventListener('change', function () {
        populateSubcategories(this.value);
    });
</script>
@endpush
