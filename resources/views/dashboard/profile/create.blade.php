@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">FOTO PROPILE</h1>
  </div>
 

<div class="col-lg-8">

    <form method="post" action="/profile/profiles" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" 
          id="nama" name="nama" placeholder="nama" value="{{ old('nama') }}"required autofocus >
          @error('nama')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="info" class="form-label">Info</label>
          <input type="text" class="form-control @error('info') is-invalid @enderror" 
          id="info" name="info" placeholder="info" value="{{ old('info') }}"required  >
          @error('info')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Foto Profile</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" 
            name="image" required onchange="previewImage()">
            @error('image')
            <div class="idvalid-feedback">
             {{ $message }}
          </div>  
        @enderror
      </div>
      <div class="mb-3">
        <label for="nohp" class="form-label">Nomer HP</label>
        <input type="text" class="form-control @error('nohp') is-invalid @enderror" 
        id="nohp" name="nohp" placeholder="nohp" value="{{ old('nohp') }}"required autofocus >
        @error('nohp')
        <div class="idvalid-feedback">
         {{ $message }}
        </div>
        @enderror
      </div>
    
              
        <button type="submit" class="btn btn-primary">Create Profile</button>
      </form>
    </div>


@endsection




