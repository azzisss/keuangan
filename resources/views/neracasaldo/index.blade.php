@extends('layout.main')
@section('mainkonten')
<div class="continer-fluid px-4">
	<h1 class="mt-4">Neraca Saldo</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Neraca Saldo</li>
	</ol>
  @if( session()->has('berhasil'))
	<div class="alert alert-success alert-dismissible fade show text-capitalize text-center fw-semibold fs-6 mt-2" role="alert">
		{{ session('berhasil') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif(session()->has('hapus'))
	<div class="alert alert-danger alert-dismissible fade show text-capitalize text-center fw-semibold fs-6 mt-2" role="alert">
		{{ session('hapus') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif(session()->has('update'))
	<div class="alert alert-warning alert-dismissible fade show text-capitalize text-center fw-semibold fs-6 mt-2" role="alert">
		{{ session('update') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif 
<div class="row justify-content-center">
 <div class="col-sm-8">
  <form action="/neracasaldo" method="get">
  <div class="input-group">
    <span class="input-group-text" id="basic-addon1">Pilih Bulan</span>
    <input type="month" class="form-control" name="nsmonth" value="{{ request('nsmonth') }}">
    <button class="btn btn-outline-secondary" type="submit">Ok</button>   
   </div>
   <br>
   <i>*Pilih Bulan Untuk Menentukan Pendapatan Kas dan Menentukan Bulan Untuk Neraca Saldo</i>
  </form>
 </div>
 </div>
 <hr>
 <div class="row justify-content-center">
  <div class="col-sm-8">
   <h3 class="text-center">Nerasa Saldo {{ $time }}</h3>
   <form action="/neracasaldos" method="post">
    @csrf
    <div class="input-group mb-3">
     <span class="input-group-text">Pendapatan Kas</span>
     <input type="number" name="pendapatan_kas" readonly class="form-control" value="{{$kas }}">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Pendapatan Penjualan</span>
    <input type="number" name="pendapatan_penjualan" oninput="this.value = Math.abs(this.value)" class="form-control" >
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Pendapatan Lain</span>
    <input type="number" name="pendapatan_lain" oninput="this.value = Math.abs(this.value)" class="form-control" >
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Gaji Pegawai</span>
    <input type="number" name="gaji_pegawai" min='0' oninput="this.value = Math.abs(this.value)" class="form-control" >
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Waktu</span>
    <input type="month" name="time"  class="form-control" value="{{ $time }}" readonly>
   </div>
   <button class="btn btn-primary" type="submit">Submit</button>
   </form>
   <br>
   <i>*Bila data pada bulan tertentu sudah ada maka otomatis mengupdate data apabila diinput ulang</i>
  </div>
 </div>

</div>
@endsection