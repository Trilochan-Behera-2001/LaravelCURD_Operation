<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>New Product</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('product.index')}}">
                <img src="logo.jpg" alt=" Logo" style="width:40px;" class="rounded-pill"> 
            </a>
          <div class="collapse navbar-collapse" id="mynavbar">
            {{-- <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Products</a>
              </li>
            </ul> --}}
            
          </div>
        </div>
      </nav>
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <Strong>{{ $message}}</Strong>
          </div>
      @endif

      @yield('main')
</body></html>