@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Klasifikasi Surat</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"  aria-current="page">Data Klasifikasi Surat</li>
  </ol>
</nav>

<table class="table table-sriped table-bordered table-hover">
  <a href="{{route('data.create')}}" type="submit" class="btn btn-primary mb-3 " >Tambah</a>
  <a href="{{route('data.export')}}" type="submit" class="btn btn-primary mb-3 ms-1" >Export Klasifikasi Surat</a>
  @if (Session::get('Success'))
  <div class="alert alert-success">{{ Session::get('Success') }}</div>
@endif
  <thead>
      <tr>
          <th>No</th>
          <th>Kode Surat</th>
          <th>Klasifikasi Surat</th>
          <th>Surat Tertaut</th>
          <th class="teks-center"></th>    
      </tr>
  </thead>
  <tbody>
      @foreach ( $data as $item )
          <tr>
              <td>{{ $loop-> iteration }}</td>
              <td>{{ $item-> letter_code}}</td>
              <td>{{ $item-> name_type}}</td>
              <td>{{ $item-> role}}</td>
              <td class="d-flex justify-content-center">
                  <a href="{{ route('data.detail', $item['id'])}}" class="btn" >Lihat</a>
                  <a href="{{route('data.edit', $item['id'])}}" class="btn btn-success mb-3 ">edit</a>
                  <form action="{{ route('data.delete', $item['id']) }}" method="post" >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger mb-3 ms-1" >Delate</button>
                  </form>
              </td>
          </tr>
      

      @endforeach 
  </tbody>
@endsection

