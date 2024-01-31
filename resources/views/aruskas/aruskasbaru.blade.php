@extends('layout.main')
@section('mainkonten')
<div class="container-fluid px-4 mt-4">
	<h1 class="">Arus Kas</h1>
		<ol class="breadcrumb mb-2 ">
			<li class="breadcrumb-item"> <a href="/aruskas">Arus Kas</a> </li>
			<li class="breadcrumb-item active">Arus Kas Baru</li>
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

	{{-- Tabel aruskas terbaru --}}
	<div class="card my-4">
		<div class="fs-6">
			<div class="card-header text-center">
				<h5>Arus Kas Terbaru</h5>
			</div>
			<div class="card-body">
				<div class="row justify-content-start">
				</div>
				<div class="table-responsive">
					<table id='example' class="table table-bordered" >
						<thead>
							<tr>
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
							<tr>
								@foreach ($admin as $item)
								@if ($item->id==$baru->id_user) 
									<td class="text-center"><a href="aruskas?name={{ $item->id }}">{{ $item->name }}</a></td>
								@endif 
							@endforeach
								<td class="text-center">{{ $baru->pemasukan}}</td>
								<td class="text-center">{{ $baru->detail_pemasukan}}</td>
								<td class="text-center">{{ $baru->pengeluaran}}</td>
								<td class="text-center">{{ $baru->detail_pengeluaran}}</td>
								<td class="text-center">{{ $baru->jumlah_total}}</td>
								<td class="text-center"> 
									<td class="text-center">
									<a href="/aruskas/{{ $baru->id }}/edit" class="btn btn-warning btn-sm mx-1 my-0.5">
										<i class="bi bi-pencil-square fs-6"></i>
									</a>
									<form action="/aruskas/{{ $baru->id }}" method="post" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-sm mx-1 my-0.5 border-0" onclick="return confirm('Yakin Akan di Hapus?')" >
										<i class="bi bi-trash-fill fs-6" ></i>
									</button>
								</form>
								</td></td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>

	{{-- <script>
		$(document).ready(function () {
					$('#example').DataTable({
						searching: false,
					});
	});
	</script> --}}
@endsection