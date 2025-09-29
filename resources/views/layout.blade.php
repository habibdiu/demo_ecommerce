<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mini E-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- jQuery first -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



  @stack('css')
</head>
<body>
<div class="container mt-4">
  <nav>
    <div class="nav nav-tabs" role="tablist">
      <a class="nav-link btn btn-sm btn-outline-primary {{ request()->routeIs('categories.*') ? 'active' : '' }}"
        href="{{ route('categories.index') }}">Categories</a>

      <a class="nav-link btn btn-sm btn-outline-primary {{ request()->routeIs('subcategories.*') ? 'active' : '' }}"
        href="{{ route('subcategories.index') }}">Subcategories</a>

      <a class="nav-link btn btn-sm btn-outline-primary {{ request()->routeIs('products.*') ? 'active' : '' }}"
        href="{{ route('products.index') }}">Products</a>
    </div>
  </nav>


  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
  <script>
  $(document).ready(function() {
      $('.js-select2').select2({
          placeholder: "Select",
          allowClear: true
      });
  });
  </script>

  @stack('js')
</div>
</body>
</html>