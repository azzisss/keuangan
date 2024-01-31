@extends('layout.main')

@section('mainkonten')
<div class="continer-fluid px-4">
	<h1 class="mt-4">Buku Besar</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Buku Besar</li>
	</ol>
	<hr>
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<div class="card my-4">
			<div class="card-header text-center">
				<h5>Buku Besar</h5>
			</div>
			<div class="card-body">
	@php
	use App\Models\Labarugi;
   // Set your timezone
   date_default_timezone_set('Asia/Jakarta');

   // Get prev & next month
   if (isset($_GET['year'])) {
   $ym = $_GET['year'];
   } else {
   // This month
   $ym = date('Y');
   }

   // Check format
   $timestamp = strtotime($ym . '-01');
   if ($timestamp === false) {
   $ym = date('Y');
   $timestamp = strtotime($ym . '-01');
   }
  
   $year = date('Y', $timestamp);
   $yearnow = date('Y');

   // You can also use strtotime!
   $prev = date('Y', strtotime('-1 year', $timestamp));
   $next = date('Y', strtotime('+1 year', $timestamp));
							
	@endphp
	<div class="text-center">
		<div class="d-flex justify-content-evenly">
	 		<h3><a class="btn btn-primary" href="?year={{ $prev }}"><<</a></h3>
	 	<h3>{{ $year }}</h3>
	 		<h3><a class="btn btn-primary" href="?year={{ $next }}">>></a></h3>
		</div>
  </div>
  <div class="table-responsive">
	<table class="table table-bordered table-success">
	 <tbody class="text-center">
	  
	  <td id="bln" style="font-weight: 500" class="@php if( date('Y', strtotime('-2 year', $timestamp)) == $yearnow  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class="text-black" style='cursor:pointer; text-decoration:none;' href="?year={{ date('Y', strtotime('-2 year', $timestamp)) }}">{{ date('Y', strtotime('-2 year', $timestamp)) }}<br>Rp {{ number_format(Labarugi::whereYear('created_at', date('Y', strtotime('-2 year', $timestamp)))->get()->sum('laba_rugi'),0,",",".")}}</a></td>

	  <td id="bln" style="font-weight: 500" class="@php if( date('Y', strtotime('-1 year', $timestamp)) == $yearnow  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class="text-black" style='cursor:pointer; text-decoration:none;' href="?year={{ date('Y', strtotime('-1 year', $timestamp)) }}">{{ date('Y', strtotime('-1 year', $timestamp)) }}<br>Rp {{ number_format(Labarugi::whereYear('created_at', date('Y', strtotime('-1 year', $timestamp)))->get()->sum('laba_rugi'),0,",",".")}}</a></td>
	  
	  <td id="bln" style="font-weight: 500" class="@php if( $year == $yearnow  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class="text-black" style='cursor:pointer; text-decoration:none;' href="?year={{ $year }}">{{ $year }}<br>Rp {{ number_format(Labarugi::whereYear('created_at', $year)->get()->sum('laba_rugi'),0,",",".")}}</a></td>
	  
	  <td id="bln" style="font-weight: 500" class="@php if( date('Y', strtotime('+1 year', $timestamp)) == $yearnow  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class="text-black" style='cursor:pointer; text-decoration:none;' href="?year={{ date('Y', strtotime('+1 year', $timestamp)) }}" >{{ date('Y', strtotime('+1 year', $timestamp)) }}<br>Rp {{ number_format(Labarugi::whereYear('created_at', date('Y', strtotime('+1 year', $timestamp)))->get()->sum('laba_rugi'),0,",",".")}}</a></td>
	  
	  <td id="bln" style="font-weight: 500" class="@php if( date('Y', strtotime('+2 year', $timestamp)) == $yearnow  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class="text-black" style='cursor:pointer; text-decoration:none;' href="?year={{ date('Y', strtotime('+2 year', $timestamp)) }}">{{ date('Y', strtotime('+2 year', $timestamp)) }}<br>Rp {{ number_format(Labarugi::whereYear('created_at', date('Y', strtotime('+2 year', $timestamp)))->get()->sum('laba_rugi'),0,",",".")}}</a></td>
	  
		</tbody>
		</table>
		<i>*klik tahun tertentu untuk memilih tahun</i>
	</div>
	</div>
</div>
</div>
</div>
<div class="row mb-3 justify-content-center">
	<div class="col-sm-10">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title text-center" >Laporan Buku Besar {{ $waktu}}  </h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-hover" style="width:100%">
						<thead>
							<tr>
						
								<th>Pendapatan Kas</th><td>:</td><td>Rp. {{ number_format($pendapatan_kas,0,",",".")}}</td>
								
							</tr>
							<tr>
								<th>Pendapatan Penjualan</th><td>:</td><td>Rp. {{ number_format($pendapatan_penjualan,0,",",".")}}</td>
							</tr>
							<tr>
								<th>Pendapatan Lain</th><td>:</td><td>Rp. {{ number_format($pendapatan_lain,0,",",".")}}</td>
							</tr>
							<tr>
								<th>Gaji Pegawai</th><td>:</td><td>Rp. {{ number_format($gaji_pegawai,0,",",".")}}</td>
							</tr>
							<tr>
								<th>Laba Rugi</th><td>:</td><td>Rp. {{ number_format($laba_rugi,0,",",".")}}</td>
							</tr>
							
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
