@extends('dashboard.layouts.main')

@section('container')

<div class="container">
  <div class="pt-3 pb-2 mb-3">
  <form action="{{ url('/user/cari') }}" method="get" class="d-flex">
      <input class="form-control me-1" type="search" name="cari" placeholder="Pencarian" id="cari">
      <button type="submit" class="btn btn-primary">Cari</button>
      {{-- <input type="submit" value="CARI"> --}}
      </form>
     </div>

  <div class="text-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Data User Keseluruhan Progres Ticket CCAN</h1>
    </div>
    <div class="table-responsive col-lg-24">
      <table class="table table-striped-columns table-bordered table-sm" >
        <thead class="table-dark">
          <tr>
            <th scope="col"> No </th>
            <th scope="col"> Name </th>
            <th scope="col"> Username </th>
            <th scope="col"> Email </th>
            <th scope="col"> Tanggal Pembuatan Akun </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection







