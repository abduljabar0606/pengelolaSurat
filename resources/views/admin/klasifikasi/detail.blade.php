@extends('layouts.template')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item "  aria-current="page">{{$detail['letter_code']}} </li>
      <li class="breadcrumb-item "  aria-current="page">{{$detail['name_type']}}</li>
    </ol>
  </nav>
  <div class="col-md-4">
    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
    <div>
        <h3 class="fs-2">{{ count(App\Models\letter_type::where('name_type')->get()) }}</h3>
        <p class="fs-5">Klasifikasi Surat</p>
    </div>
    <i class="ri-bookmark-fill fs-1"></i>
    </div>
</div>
@endsection