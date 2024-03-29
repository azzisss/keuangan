@extends('layout.main')

@section('mainkonten')
<div class="container-fluid px-4 mt-4 mb-3">
	<h1 class="">Data Akun</h1>
		<ol class="breadcrumb mb-2 ">
			<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
			<li class="breadcrumb-item active">Data Akun</li>
		</ol>
		<hr>
	@include('partials.massage')
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-header">
					<h5 class="text-center">Data Akun</h5>
				</div>
				<div class="card-body">
					<a href="/akun/create" class="btn btn-success mb-2"> Tambah Akun </a>
					<div class="table-responsive">
						<table id="example" class="table table-bordered border-primary" >
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Akses</th>
									<th>Operasi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($akun as $item)
								<tr>
									<th>{{ $loop->iteration }}</th>
									<td>{{ $item->name }}</td>
									<td>{{ $item->username }}</td>
									@foreach ($akses as $itemakses)
													@if ($item->id_akses == $itemakses->id)
																	<td>{{ $itemakses->nama_akses }}</td>
													@endif
									@endforeach
									<td class="text-center">
										<button class="btn btn-warning btn-sm mx-1 my-0.5 border-0">
											<a href="/akun/{{ $item->id }}/edit"  style="text-decoration: none; color:white;">
												<i class="bi bi-pencil-square"></i>ubah
											</a>
	
										</button>
										@if (count($akun) <= 1)
											<button class="btn btn-danger btn-sm mx-1 my-0.5 border-0" disabled>
											<i class="bi bi-trash-fill" ></i>hapus
										</button>
										@else
											<form action="/akun/{{ $item->id }}" method="post" class="d-inline">
											@method('delete')
											@csrf
											<button class="btn btn-danger btn-sm mx-1 my-0.5 border-0" onclick="return confirm('Yakin Akan di Hapus?')" >
												<i class="bi bi-trash-fill" ></i>hapus
											</button>
											</form>
										@endif
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
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
	$(document).ready(function () {
	 $('#example').DataTable();
});
</script>
@endsection