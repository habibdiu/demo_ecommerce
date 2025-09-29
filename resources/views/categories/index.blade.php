@extends('layout')
@section('content')
<div class="text-end mt-3 mb-3">
  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Add Category</a>
</div>

  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Name</th><th>Total Subcategories</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @foreach($categories as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->subcategories_count }}</td>
        <td class="text-end">
          <a href="{{ route('categories.edit', $c) }}" class="btn btn-success btn-icon">
              <i class="fa-solid fa-edit"></i>
          </a>


          <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection