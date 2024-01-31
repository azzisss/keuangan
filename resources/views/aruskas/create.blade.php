@extends('layout.main')
@section('mainkonten')

<div class="container-fluid px-4 mt-4">
	<h1 class="">Arus Kas</h1>
		<ol class="breadcrumb mb-2 ">
			<li class="breadcrumb-item"> <a href="/aruskas">Arus Kas</a></li>
			<li class="breadcrumb-item"> Tambah Arus Kas</li>
		</ol>
		<hr>
	<div class="row">

  {{-- input pemasukkan kas --}}
		<div class="d-flex justify-content-evenly flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 ">
				<h3 style="text-transform:capitalize" class="h4">Tambah Arus Kas</h3>
		</div>
		<div class="d-flex justify-content-center">
			
			<div class="col-8">
				<form method="post" action="/aruskas" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="pemasukan" class="form-label">Pemasukan Kas</label>
      <div class="input-group mb-3">
       <span class="input-group-text" id="basic-addon1">Rp</span>
       <input type="number" onfocus="mulaiHitung()" onblur="stopHitung()" class="form-control @error('pemasukkan') is-invalid @enderror" id="pemasukan" name="pemasukan" required autocomplete="off" oninput='this.value = Math.abs(this.value)'>
 
       @error('pemasukan')
       <div class="invalid-feedback" id="pemasukan">
        {{ $message }}
       </div>
       @enderror
 
     </div>
					</div>
					<div class="mb-3">
						<label for="detail_pemasukan" class="form-label">Detail Pemasukan kas</label>
						<input type="text" class="form-control @error('detail_pemasukan') is-invalid @enderror" id="detail_pemasukan" name="detail_pemasukan"  >

						@error('detail_pemasukan')
						<div class="invalid-feedback" id="detail_pemasukan">
							{{ $message }}
						</div>
						@enderror
					</div>


     
{{-- input pengeluaran --}}
					<div class="mb-3">
      <label for="pengeluaran" class="form-label">Pengeluaran Kas</label>
      <div class="input-group mb-3">
       <span class="input-group-text" id="basic-addon1">Rp</span>
       <input type="number" onfocus="mulaiHitung()" onblur="stopHitung()" class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" name="pengeluaran" oninput='this.value = Math.abs(this.value)' required autocomplete="off">
 
       @error('pengeluaran')
       <div class="invalid-feedback" id="pengeluaran">
        {{ $message }}
       </div>
       @enderror
     </div>
					</div>

     <div class="mb-3">
						<label for="detail_pengeluaran" class="form-label">Detail Pengeluaran Kas</label>
						<input type="text" class="form-control @error('detail_pengeluaran') is-invalid @enderror" id="detail_pengeluaran" name="detail_pengeluaran">

						@error('detail_pengeluaran')
						<div class="invalid-feedback" id="detail_pengeluaran">
							{{ $message }}
						</div>
						@enderror
					</div>

     <div class="mb-3">
						<label for="jumlah_total" class="form-label">Jumlah Total</label>
      <div class="input-group mb-3">
       <span class="input-group-text" id="basic-addon1">Rp</span>
       <input type="number" min="0" readonly class="form-control @error('jumlah_total') is-invalid @enderror" id="jumlah_total" name="jumlah_total" onfocus='mulaiHitung()'
       onblur='stopHitung()' required autocomplete="off">
 
       @error('jumlah total')
       <div class="invalid-feedback" id="jumlah total">
        {{ $message }}
       </div>
       @enderror
     </div>
					</div>

					<button type="submit" class="btn btn-primary mb-2">Tambah Arus Kas</button>
				</form>

			</div>
		</div>
	</div>
</div>

<script>
// Penghitungan total arus kas
function mulaiHitung(){
 interval = setInterval("Hitung()", 1);
}
function Hitung(){
 pemasukan    = document.getElementById('pemasukan').value;
 pengeluaran  = document.getElementById('pengeluaran').value;
 total        = pemasukan - pengeluaran;
 jumlah_total = document.getElementById('jumlah_total').value = total;
}
function stopHitung(){
clearInterval(interval);
}
</script>
    
@endsection