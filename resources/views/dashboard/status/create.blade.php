@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">INPUT NAMA STATUS</h1>
  </div>
 

<div class="col-lg-8">

    <form method="post" action="/dashboard/statusas" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Status</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" 
          id="name" name="name" value="{{ old('name') }} "required autofocus>
          @error('name')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
              
        <button type="submit" class="btn btn-primary">Create Status</button>
      </form>
    </div>


@endsection




