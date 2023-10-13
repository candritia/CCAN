@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan Type</h1>
  </div>
  
  
  <div class="card mb-2 col-md-6">
    <div class="bg-white">
      <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Edit Postingan Type
      </div>
      <div class="card-body">
        <form method="post" action="/dashboard/categories/{{ $category->id }}" class="mb-5"enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Type</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
          id="name" name="name" value="{{ old('name', $category->name) }}"required autofocus >
          @error('name')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
    
          
        <a href="/dashboard/categories"class="btn btn-success"><span data-feather="arrow-left"></span> Back To all My Type</a>
        <button type="submit" class="btn btn-primary">Update Type</button>
      </form>

      
        </div>
      </div>
    </div>

@endsection






