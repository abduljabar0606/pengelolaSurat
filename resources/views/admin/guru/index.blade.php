@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" active" aria-current="page">Data Guru</li>
  </ol>
</nav>

<table class="table table-sriped table-bordered table-hover">
  <a href="{{ route('guru.create') }}" type="submit" class="btn btn-primary mb-3" >Tambah</a>
  <thead>
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th class="teks-center"></th>    
      </tr>
  </thead>
  <tbody>
      @foreach ( $user as $item )
          <tr>
              <td>{{ $loop-> iteration }}</td>
              <td>{{ $item-> name}}</td>
              <td>{{ $item-> email}}</td>
              <td>{{ $item-> role}}</td>
              <td class="d-flex justify-content-center">
                  <a href="{{ route('guru.edit', $item['id'])}}" class="btn btn-success mb-3 ">edit</a>
                  <form action="{{ route('guru.delete', $item['id']) }}" method="post" >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger mb-3 ms-1" >Delate</button>
                  </form>
              </td>
          </tr>
      

      @endforeach 
  </tbody>
@endsection

