@extends('layout')
@section('content')
  <h3>Subcategories</h3>
  <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-2">Add Subcategory</a>
  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Name</th><th>Category</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($subcategories as $s)
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->category->name }}</td>
        <td>
          <a href="{{ route('subcategories.edit', $s) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('subcategories.destroy', $s) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection