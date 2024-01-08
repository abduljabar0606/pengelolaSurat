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
    <form action="{{ route('login.auth')}}" method="POST" class="card p-5">
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed' )}}</div>
        @endif
        @if (Session::get('logout'))
            <div class="alert alert-primary">{{ Session::get('logout' )}}</div>
        @endif
        @if (Session::get('canAccess'))
            <div class="alert alert-danger">{{ Session::get('canAccess' )}}</div>
        @endif
    
        <div class="mb-3 ">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" autofocus>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 ">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3" >LOGIN</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

