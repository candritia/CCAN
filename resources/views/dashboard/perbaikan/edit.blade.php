@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan Perbaikan</h1>
  </div>
 

  <div class="card mb-2 col-md-6">
    <div class="bg-white">
    <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Edit Postingan Perbaikan
    </div>
    <div class="card-body">
      <form method="post" action="/dashboard/perbaikans/{{ $perbaikan->id }}" class="mb-5"enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Perbaikan</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" 
          id="name" name="name" value="{{ old('name', $perbaikan->name) }}"required autofocus >
          @error('name')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
    
          
        <a href="/dashboard/perbaikans"class="btn btn-success"><span data-feather="arrow-left"></span> Back To all My Perbaikan</a>
        <button type="submit" class="btn btn-primary">Update Perbaikan</button>
      </form>

      </div>
    </div>
    
    </div>

@endsection






