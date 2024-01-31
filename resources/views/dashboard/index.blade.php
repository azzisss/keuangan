@extends('layout.main')

@section('mainkonten')
<div class="container-fluid px-4">
 <h1 class="mt-4">Dashboard @if (Auth::user()->id_akses==1) Admin @else Owner @endif</h1>
 <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"><a href="/">Dashboard</a> </li>
 </ol>
</div>
<div class="row mb-3 justify-content-start ms-3">
    
    @if (Auth::user()->id_akses==1)
    <div class="col-sm-3 col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><b>Mengelola Data Akun</b></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/akun">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
      </div>
      @endif
      <div class="col-sm-3 col-xl-3 col-md-6">
       <div class="card bg-warning text-white mb-4">
           <div class="card-body"><b>Mengelola Arus Kas</b></div>
           <div class="card-footer d-flex align-items-center justify-content-between">
               <a class="small text-white stretched-link" href="/aruskas">View Details</a>
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
           </div>
       </div>
      </div>
      <div class="col-sm-3 col-xl-3 col-md-6">
       <div class="card bg-danger text-white mb-4">
           <div class="card-body"><b>Laporan Arus Kas</b></div>
           <div class="card-footer d-flex align-items-center justify-content-between">
               <a class="small text-white stretched-link" href="/laporanaruskas">View Details</a>
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
           </div>
       </div>
      </div>
      <div class="col-sm-3 col-xl-3 col-md-6">
       <div class="card bg-success text-white mb-4">
           <div class="card-body"><b>Buku Besar</b></div>
           <div class="card-footer d-flex align-items-center justify-content-between">
               <a class="small text-white stretched-link" href="#">View Details</a>
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
           </div>
       </div>
      </div>
      <div class="col-xl-3 col-md-6">
       <div class="card bg-secondary text-white mb-4">
           <div class="card-body"><b>Neraca Saldo</b></div>
           <div class="card-footer d-flex align-items-center justify-content-between">
               <a class="small text-white stretched-link" href="/neracasaldo">View Details</a>
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
           </div>
       </div>
      </div>
      <div class="col-sm-3 col-xl-3 col-md-6">
       <div class="card bg-success text-white mb-4">
           <div class="card-body"><b>Laba Rugi</b></div>
           <div class="card-footer d-flex align-items-center justify-content-between">
               <a class="small text-white stretched-link" href="/labarugi">View Details</a>
               <div class="small text-white"><i class="fas fa-angle-right"></i></div>
           </div>
       </div>
      </div>
</div>
@endsection