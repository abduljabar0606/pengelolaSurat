<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
          <a class="navbar-brand" href="#">Pengelolaan Surat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home.page')}}">Dashboard</a>
              </li>
              @if (Auth::check())
                @if (Auth::user()->role == 'staff')
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Data User
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('staff.index')}}">Data Staff Tata Usaha</a></li>
                    <li><a class="dropdown-item" href="{{route('guru.index')}}">Data Guru</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Data Surat
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('data.index')}}">Data Klasifikasi Surat </a></li>
                    <li><a class="dropdown-item" href="{{route('surat.index')}}">Data Surat</a></li>
                  </ul>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('guru.surat.index')}}">Data Surat</a>
                </li>  
                @endif
                
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="{{route('logout')}}">logout</a></li>
                  </ul>
              @endif
              </li>
            </ul>
            </ul>
          
          </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>