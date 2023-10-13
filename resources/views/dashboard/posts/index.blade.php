@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Input Data Progres Ticket CCAN</h1>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-24" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="container">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-1">
      <span data-feather="edit-2"></span>Add To Ticket</a>
    </div>
    <div class="container">
      <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>Ticket</th>
                <th>Custemer</th>
                <th>Nama_Pic</th>
                <th>ServicesID</th>
                <th>Area</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Perbaikan</th>
                <th>Typee</th>
                <th>Status</th>
                <th>Action</th>
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
                <td>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0"
                   onclick="return confirm('Apakah Anda Ingin Meng Hapus nya?')"> <span data-feather="trash-2"></span></button>
                  </form>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
          </table>
        

      </div>
    </div>
        <div class="d-flex justify-content-end mt-3 mb-3">
        {{ $posts->links() }}
      </div>
  @endsection

</div>

