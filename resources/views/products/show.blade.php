@extends('layout')
@section('content')
  <div class="row">
    <div class="col-md-6">
      @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
      @endif
    </div>
    <div class="col-md-6">
      <h3>{{ $product->name }}</h3>
      <p><strong>Category:</strong> {{ $product->category->name }}</p>
      <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
      <p>{{ $product->description }}</p>
      <p>
        @if($product->old_price) <s>{{ number_format($product->old_price,2) }}</s> @endif
        <strong>{{ number_format($product->new_price,2) }}</strong>
      </p>
      <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
@endsection