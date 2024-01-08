@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Edit Data Staff Tata Usaha</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('guru.index')}}">Data Staff Tata Usaha</a></li>
    <li class="breadcrumb-item" active" aria-current="page">Edit Data Staff Tata Usaha</li>
  </ol>
</nav>
<form action="{{ route('guru.update', $user['id']) }}" method="POST">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection