@extends('dashboard.layouts.main')

@section('container')



{{-- <div class="text-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">DATA KESELURUHAN PROGRES TICKET</h1>
</div> --}}
<div class="text-center flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-3 border-bottom">
  <h1 class="h2">Data Keseluruhan Progres Ticket CCAN</h1>
</div>
<div class="container">
  <div class="row justify-content-center mb-1">
    <div class="col-md-12">
      <div class="pt-2 pb-2 mb-2">
      <form action="{{ url('/post/cari') }}" method="get" class="d-flex">
          <input class="form-control me-1" type="search" name="cari"  placeholder="Pencarian" id="cari">
          <button type="submit" class="btn btn-danger">Cari</button>
          </form>
         </div>    
    </div>
  </div>
  <div class="card mb-2">
    <div class="bg-white">
    <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Data Table Progres Ticket CCAN
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped-columns  table-bordered table-sm bg-white" >
            <thead>
              <tr>
                <th> No </th>
                <th> Ticket </th>
                <th> Custemer </th>
                <th> Nama_Pic </th>
                <th> ServicesID </th>
                <th> Area </th>
                <th> Petugas </th>
                <th> Tanggal</th>
                <th> Perbaikan </th>
                <th> Type </th>
                <th> Status </th>
              </tr>
                
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->nama_costemer }}</td>
                <td>{{ $post->nama_pic }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->area->name }}</td>
                <td>{{ $post->petugasan->name }}</td>
                <td>{{ $post->tgl }}</td>
                <td>{{ $post->perbaikan->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->statusa->name }}</td>
               
              </tr>
                  
              @endforeach
                
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-end mt-3 mb-3">
  {{ $posts->links() }}
</div>
{{-- <div class="table-responsive col-lg-24">
      <table class="table table-striped-columns table-bordered table-sm" >
        <thead class="table-dark">
          <tr>
            <th scope="col"> No </th>
            <th scope="col"> Ticket </th>
            <th scope="col"> Custemer </th>
            <th scope="col"> Nama_Pic </th>
            <th scope="col"> Servic_ID </th>
            <th scope="col"> Area </th>
            <th scope="col"> Petugas_Ticket_CCAN </th>
            <th scope="col"> Tanggal_Perbaikan</th>
            <th scope="col"> Perbaikan_Wifi_Custemer </th>
            <th scope="col"> Type </th>
            <th scope="col"> Status </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->nama_costemer }}</td>
            <td>{{ $post->nama_pic }}</td>
            <td>{{ $post->id }}</td>
            <td>{{ $post->area->name }}</td>
            <td>{{ $post->petugasan->name }}</td>
            <td>{{ $post->tgl }}</td>
            <td>{{ $post->perbaikan->name }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->statusa->name }}</td>
           
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div> --}}

  @endsection







