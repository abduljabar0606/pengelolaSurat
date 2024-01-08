@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Klasifikasi Surat</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('data.index')}}">Data Klasifikasi Surat</a></li>
    <li class="breadcrumb-item" active" aria-current="page">Tambah Data Klasifikasi Surat</li>
  </ol>
</nav>
<form action="{{route('data.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="number" class="form-label">Kode Surat</label>
    <input type="number" class="form-control" id="number"  name="letter_code">
    @error('number')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="klasifikasi" class="form-label">Klasifikasi Surat</label>
    <input type="klasifikasi" class="form-control" id="klasifikasi" name="name_type">
    @error('email')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection