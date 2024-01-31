@extends('layout.main')

@section('mainkonten')
   <div class="container-fluid px-4">
      <h1 class="mt-4">
         Laporan Arus Kas
      </h1>
      <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
         <li class="breadcrumb-item active">Laporan Arus Kas</li>
      </ol>
      <hr>
      <div class="row mb-3 justify-content-center">
         
      </div>
      <div class="row mb-3 justify-content-center">
         <div class="col-sm-10">
            <form action="/laporanaruskas" method="get">			
               <div class="mb-3">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">Tanggal Awal</span>
                    <input type="date" class="form-control" name="awal" value="{{ request('awal') }}">
                    <span class="input-group-text" id="basic-addon3">Tanggal Akhir</span>
                    <input type="date" class="form-control" name="akhir" value="{{ request('akhir') }}">
                    <button class="btn btn-outline-primary border" type="submit">Search</button>
                  </div>
                  <div class="form-text" id="basic-addon4">Filter untuk mencari laporan aruskas berdasarkan tanggal.</div>
                </div>
            </form>
         </div>
         <div class="col-sm-10">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title text-center"> Laporan Arus Kas</h5>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     {{-- total kas --}}
                     {{-- <div class="col-sm-5">
                        <div class="mb-3">
                           <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1"> <b>Total Kas Rp.</b></span>
                              <input type="number" class="form-control" readonly value="{{ $totalkas }}">
                           </div>
                        </div>
                     </div> --}}
                     <table id="example" class="table table-hover" style="width:100%">
                        <thead>
                           <tr>
                              <td>No</td>
                              <td>Admin</td>
                              <td>Pemasukan</td>
                              <td>Detail Pemasukan</td>
                              <td>Pengeluaran</td>
                              <td>Detail Pengeluaran</td>
                              <td>Jumlah Total</td>
                              <td>Hari/Tanggal</td>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($laporan as $item)
                               <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 @foreach ($admin as $item2)
                                 @if ($item->id_user==$item2->id) 
                                    <td class="text-center"><a href="aruskas?name={{ $item2->id }}">{{ $item2->name }}</a></td>
                                 @endif 
                                 @endforeach
                                 <td class="text-start">{{ $item->pemasukan}} </td>
                                 <td class="text-start">{{ $item->detail_pemasukan}}</td>
                                 <td class="text-start">{{ $item->pengeluaran}} </td>
                                 <td class="text-start">{{ $item->detail_pengeluaran}}</td>
                                 <td class="text-start">{{ $item->jumlah_total}}</td>
                                 <td class="text-start">{{ date('d-m-Y H:i:s', strtotime($item->created_at))}}</td>
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

   <script>
      $(document).ready(function() {
         table();
      });
      function table() {
         var table = $('#example').DataTable({
            lengthChange: false,
               buttons: [ 'copy', 'excel', 'pdf','print' ]
          });
       
         table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      }
      </script>

@endsection