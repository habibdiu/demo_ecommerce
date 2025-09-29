@extends('layout')
@section('content')
<div class="text-end mt-3 mb-3">
  <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-2">Add Subcategory</a>
</div>

  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Name</th><th>Category</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @foreach($subcategories as $s)
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->category->name }}</td>
        <td class="text-end">
          <a href="{{ route('subcategories.edit', $s) }}" class="btn btn-success btn-icon"><i class="fa-solid fa-edit"></i></a>

          <form action="{{ route('subcategories.destroy', $s) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection