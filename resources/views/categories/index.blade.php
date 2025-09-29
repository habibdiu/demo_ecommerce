@extends('layout')
@section('content')
  <h3>Categories</h3>
  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Add Category</a>

  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Name</th><th>Total Subcategories</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($categories as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->subcategories_count }}</td>
        <td>
          <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection