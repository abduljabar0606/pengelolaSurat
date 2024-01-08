@extends('layouts.template')

@section('content')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Staff Tata Usaha</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('staff.index')}}">Data Staff Tata Usaha</a></li>
    <li class="breadcrumb-item" active" aria-current="page">Tambah Data Staff Tata Usaha</li>
  </ol>
</nav>
<form action="{{ route('staff.store') }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" id="name"  name="name">
    @error('name')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
    @error('email')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection