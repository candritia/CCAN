@extends('dashboard.layouts.main')

@section('container')
  <div class="text-center pt-1 pb-1 mb-1 border-bottom">
      <h1 class="h2">Data Pencarian Progres Ticket CCAN</h1>
    </div>
    <div class="container pt-1 pb-2 mb-3">
    <a href="/post"class="btn btn-secondary"><span data-feather="arrow-left"></span>  Back To all My Progres Ticket</a>
    </div>
    {{-- <div class="table-responsive col-lg-24">
      <table class="table table-striped table-bordered table-sm" >
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Ticket</th>
            <th scope="col">Custemer</th>
            <th scope="col">Nama_Pic</th>
            <th scope="col">Servic_ID</th>
            <th scope="col">Area</th>
            <th scope="col">Petugas_ticket_CCAN</th>
            <th scope="col">Tanggal_Perbaikan</th>
            <th scope="col">Perbaikan_Wifi_Custemer</th>
            <th scope="col">type</th>
            <th scope="col">Status</th>
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
    </div> --}}
    <div class="card mb-2">
      <div class="bg-white">
      <div class="card-header bg-danger text-white">
          <i class="fas fa-table me-1"></i>
          Data Table Pencarian Progres Ticket CCAN
      
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

  @endsection







