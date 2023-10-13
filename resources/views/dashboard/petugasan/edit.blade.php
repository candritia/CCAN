@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan Petugas</h1>
  </div>
 


  <div class="card mb-2 col-md-6">
    <div class="bg-white">
    <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Edit Postingan Petugas
    </div>
    <div class="card-body">
      <form method="post" action="/dashboard/petugasans/{{ $petugasan->id }}" class="mb-5"enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name Petugas</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" 
          id="name" name="name" value="{{ old('name', $petugasan->name) }}"required autofocus >
          @error('name')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
    
          
        <a href="/dashboard/petugasans"class="btn btn-success"><span data-feather="arrow-left"></span> Back To all My Petugas</a>
        <button type="submit" class="btn btn-primary">Update Petugas</button>
      </form>

      </div>
    </div>
    
    </div>

@endsection






