<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mini E-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @stack('css')
</head>
<body>
<div class="container mt-4">
  <nav class="mb-3">
    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">Categories</a>
    <a href="{{ route('subcategories.index') }}" class="btn btn-sm btn-outline-primary">Subcategories</a>
    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">Products</a>
  </nav>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
  @stack('js')
</div>
</body>
</html>