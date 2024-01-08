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
    <li class="breadcrumb-item"><a href="{{ route('data.index')}}">Data Staff Tata Usaha</a></li>
    <li class="breadcrumb-item" active" aria-current="page">Edit Data Staff Tata Usaha</li>
  </ol>
</nav>
<form action="{{ route('data.update', $data['id']) }}" method="POST">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="letter_code" class="form-label">Kode Surat</label>
    <input type="letter_code" value="{{$data['letter_code']}}" class="form-control" id="letter_code"  name="letter_code">
  </div>
  <div class="mb-3">
    <label for="name_type" class="form-label">Klasifikasi Surat</label>
    <input type="name_type" value="{{$data['name_type']}}" class="form-control" id="name_type" name="name_type">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection