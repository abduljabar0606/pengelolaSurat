@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><h4>Data Surat</h4></li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Surat</li>
  </ol>
</nav>

<table class="table table-sriped table-bordered table-hover">
  @if (Auth::check())
  @if (Auth::user()->role == 'staff')
  <a href="{{ route('surat.create') }}" type="submit" class="btn btn-primary mb-3" >Tambah</a>
  @if (Session::get('delete'))
  <div class="alert alert-success">{{ Session::get('delete') }}</div>
@endif
  {{-- <a href="{{ route('surat.create') }}" type="submit" class="btn btn-primary mb-3" >Tambah</a> --}}
  <thead>
      <tr>
          <th>No</th>
          <th>Nomer Surat</th>
          <th>Perihal</th>
          <th>Tanggal Keluar</th>
          <th>Penerima Surat</th>
          <th>Notulis</th>
          <th>Hasil Rapat</th>
          <th class="teks-center"></th>    
      </tr>
  </thead>
  <tbody>
   @foreach ($letter as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->letter_type_id }}</td>
        <td>{{ $item->letter_perihal }}</td>
        <td>{{ $item->created_at->format('d/m/Y') }}</td>
        <td>
            @if(is_array($item->recipients))
                @foreach($item->recipients as $recipient)
                    {{ $recipient['name'] }}
                @endforeach
            @else
                {{ $item->recipients }}
            @endif
        </td>
        <td>{{ $item->notulis }}</td>
        <td class="d-flex justify-content-center">
            <a href="" class="btn">Lihat</a>
            <a href="{{ route('surat.edit', $item['id'])}}" class="btn btn-success mb-3">edit</a>
            <form action="{{ route('surat.delete', $item['id'])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-3 ms-1">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

      @else
      <thead>
        <tr>
            <th>No</th>
            <th>Nomer Surat</th>
            <th>Perihal</th>
            <th>Tanggal Keluar</th>
            <th>Penerima Surat</th>
            <th>Notulis</th>
            <th>Hasil Rapat</th>
            <th class="teks-center"></th>    
        </tr>
    </thead>
    <tbody>
        @foreach ( $letter as $item )
            <tr>
                <td>{{ $loop-> iteration }}</td>
                <td>{{ $item-> letter_type_id}}</td>
                <td>{{ $item-> letter_perihal}}</td>
                <td>{{ $item-> created_at->format('d/m/Y')}}</td>
                <td>
                  @if(is_array($item->recipients))
                      @foreach($item->recipients as $recipient)
                          {{ $recipient['name'] }}
                      @endforeach
                  @else
                      {{ $item->recipients }}
                  @endif
              </td>
                <td>{{ $item-> notulis}}</td>
                <td>#</td>
                <td class="d-flex justify-content-center">
                  <a href="" class="btn" >Lihat</a>
                </td>
            </tr>
            @endforeach 
      @endif 
  </tbody>
  @endif
@endsection

