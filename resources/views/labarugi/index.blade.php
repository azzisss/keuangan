@extends('layout.main')
@section('mainkonten')
<div class="continer-fluid px-4">
	<h1 class="mt-4">Laba Rugi</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Laba Rugi</li>
	</ol>
 <hr>
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<div class="card my-4">
			<div class="card-header text-center">
				<h5>Laba Rugi</h5>
			</div>
			<div class="card-body">
						@php
							use App\Models\Labarugi;
							// Set your timezone
							date_default_timezone_set('Asia/Jakarta');
	
							// Get prev & next month
							if (isset($_GET['month'])) {
									$ym = $_GET['month'];
							} else {
									// This month
									$ym = date('Y-m');
							}
	
							// Check format
							$timestamp = strtotime($ym . '-01');
							if ($timestamp === false) {
									$ym = date('Y-m');
									$timestamp = strtotime($ym . '-01');
							}
	
							// Today
							$thismonth = date('m-Y', time());
	
							// For H3 title
							$month = date('F - Y', $timestamp);
	
							$year = date('Y', $timestamp);
	
							// Untuk link
							$m = date('m',$timestamp);
							
							// You can also use strtotime!
							$prev = date('Y', strtotime('-1 year', $timestamp));
							$next = date('Y', strtotime('+1 year', $timestamp));
	
							// Number of days in the month
	
							
						@endphp
						<div class="text-center">
							<div class="d-flex justify-content-evenly">
								<h3><a class="btn btn-primary" href="?month={{ $prev }}"><<</a></h3>
								<h3>{{ $year }}</h3>
								<h3><a class="btn btn-primary" href="?month={{ $next }}">>></a></h3>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-success">
								<thead>
								</thead>
								<tbody class="text-center">
									<tr>
										<td id="bln" style="font-weight: 500" class=" @php if( '01-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-1">Januari
												<br>Rp {{ number_format(Labarugi::whereMonth('time', '01' )->whereYear('time', $year)->get()->sum('total_bayar'),0,",",".")}}
											</a>
										</td>
										<td id="bln" style="font-weight: 500" class=" @php if( '02-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-2"> Februari
												<br> Rp {{ number_format(Labarugi::whereMonth('time', '02' )->whereYear('time', $year)->get()->sum('total_bayar'),0,",",".");}}
											</a>
										</td>
										<td id="bln" style="font-weight: 500" class=" @php if('03-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} 
										@endphp">
										<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-03"> Maret <br>Rp {{ number_format(Labarugi::whereMonth('time', '3' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if('04-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp"><a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-4">April <br> Rp {{ number_format(Labarugi::whereMonth('time', '04' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
									</tr>
									<tr>
										<td id="bln" style="font-weight: 500" class=" @php if('05-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-05">Mei <br>Rp {{ number_format(Labarugi::whereMonth('time', '5' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if('06-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-06">Juni Rp <br>{{ number_format(Labarugi::whereMonth('time', '6' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if('07-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-7">Juli Rp <br>{{ number_format(Labarugi::whereMonth('time', '7' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if('08-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-8">Agustus <br> Rp {{ number_format(Labarugi::whereMonth('time', '8' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
									</tr>
										<tr>
										<td id="bln" style="font-weight: 500" class=" @php if('09-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-9">September <br>Rp {{ number_format(Labarugi::whereMonth('time', '9' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if( '10-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-10">Oktober <br>Rp {{ number_format(Labarugi::whereMonth('time', '10' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if( '11-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-11">November <br>Rp {{ number_format(Labarugi::whereMonth('time', '11' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
										<td id="bln" style="font-weight: 500" class=" @php if( '12-'.$year == $thismonth  ){echo "bg-danger fs-6 bg-opacity-25";} @endphp">
											<a class='text-black' style='font-weight:500; cursor:pointer; text-decoration:none;'href="labarugi?month={{ $year }}-12">Desember <br>Rp {{ number_format(Labarugi::whereMonth('time', '12' )->whereYear('time', $year)->get()->sum('laba_rugi'),0,",",".");}}</a></td>
									</tr>
								</tbody>
							</table>
							<i>*klik bulan tertentu untuk memilih bulan</i>
						</div>
			</div>
		</div>

		</div>
	</div>
	<div class="row mb-3 justify-content-center">
		<div class="col-sm-10">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title text-center" >Laporan Laba Rugi Bulan {{ $waktu}}  </h5>
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