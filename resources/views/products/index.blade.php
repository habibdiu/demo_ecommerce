@extends('layout')
@section('content')
  <h3>All Products</h3>
  <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

  @foreach($subcategories as $sub)
    <h5 class="mt-4">{{ $sub->category->name }} / {{ $sub->name }}</h5>
    @if($sub->products->isEmpty())
      <div class="text-muted">No products</div>
    @else
      <div class="row">
        @foreach($sub->products as $p)
          <div class="col-md-4 mb-3">
            <div class="card">
              @if($p->image)
                <img src="{{ asset('storage/' . $p->image) }}" class="card-img-top" style="height:180px;object-fit:cover;">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($p->description, 80) }}</p>
                <p>
                  @if($p->old_price) <s>{{ number_format($p->old_price,2) }}</s> @endif
                  <strong>{{ number_format($p->new_price,2) }}</strong>
                </p>
                <a href="{{ route('products.show', $p) }}" class="btn btn-sm btn-outline-primary">View</a>
                <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Delete product?')">Delete</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  @endforeach
@endsection