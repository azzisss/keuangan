@extends('layout.main')

@section('mainkonten')
	<div class="container-fluid px-4 mt-4">
		<h1 class="">Arus Kas</h1>
			<ol class="breadcrumb mb-2 ">
				<li class="breadcrumb-item "><a href="/home">Dashboard</a></li>
				<li class="breadcrumb-item active">Arus Kas</li>
			</ol>
			<hr>
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
		<div class="card my-4">
		<div class="fs-6">
			<div class="card-header text-center">
				<h5>Arus Kas</h5>
			</div>
		<div class="card-body">
			<div class="row justify-content-start">
				{{-- button tambah arus kas --}}
				<div class="col-sm-2">
					<a href="/aruskas/create" class="btn btn-success mb-2"> Tambah Arus Kas </a>
				</div>
				{{-- button aruskas terbaru --}}
				<div class="col-sm-2">
					<a href="/aruskasbaru" class="btn btn-warning mb-2"> Arus Kas Terbaru</a>
				</div>
				{{-- total kas --}}
				{{-- <div class="col-sm-5">
					<div class="mb-3">
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"> <b>Total Kas Rp.</b></span>
							<input type="number" class="form-control" readonly value="{{ $totalkas }}">
						</div>
					</div>
				</div> --}}
				{{-- searching arus kas --}}
				<div class="col-sm-3">
					<div class="mb-3">
						<form action="/aruskas" method="get">			
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" >
									<button class="btn btn-outline-primary border" type="submit">Search</button>
								</div>
						</form>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table id='example' class="table table-bordered" >
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Admin</th>
							<th scope="col" class="text-center">Pemasukan</th>
							<th scope="col" class="text-center">Detail Pemasukan</th>
							<th scope="col" class="text-center">Pengeluaran</th>
							<th scope="col" class="text-center">Detail Pengeluaran</th>
							<th scope="col" class="text-center">Jumlah Total</th>
							<th scope="col" class="text-center">Operasi</th>
						</tr>
					</thead>
					<tbody class="table-group-divider">
					@foreach ($aruskas as $item)
					<tr>
						{{-- ambil nama admin --}}
						<td class="texy-center">{{ $loop->iteration }}</td>
							@foreach ($admin as $item2)
								@if ($item->id_user==$item2->id) 
									<td class="text-center"><a href="aruskas?name={{ $item2->id }}">{{ $item2->name }}</a></td>
								@endif 
							@endforeach
						<td class="text-center">{{ $item->pemasukan}} </td>
						<td class="text-center">{{ $item->detail_pemasukan}}</td>
						<td class="text-center">{{ $item->pengeluaran}} </td>
						<td class="text-center">{{ $item->detail_pengeluaran}}</td>
						<td class="text-center">{{ $item->jumlah_total}}</td>
						{{-- kolom operasi data arus kas --}}
							<td class="text-center">
								<a href="/aruskas/{{ $item->id }}/edit" class="btn btn-warning btn-sm mx-1 my-0.5">
									<i class="bi bi-pencil-square fs-6"></i>
								</a>
								<form action="/aruskas/{{ $item->id }}" method="post" class="d-inline">
								@method('delete')
								@csrf
								<button class="btn btn-danger btn-sm mx-1 my-0.5 border-0" onclick="return confirm('Yakin Akan di Hapus?')" >
									<i class="bi bi-trash-fill fs-6" ></i>
								</button>
							</form>
							</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
	</div>

<script>
	$(document).ready(function () {
	$('#example').DataTable({
		searching: false,
		});
	});

</script>
@endsection



