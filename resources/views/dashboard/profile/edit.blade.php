@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan Profile</h1>
  </div>
 

  <div class="card mb-3 col-md-6">
    <div class="bg-white">
    <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Edit Postingan Profile
    </div>
    <div class="card-body">
      <form method="post" action="/profile/profiles/{{ $profile->id }}" class="mb-5"enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" 
      id="nama" name="nama"  value="{{ old('nama', $profile->nama) }}"required autofocus >
      @error('nama')
      <div class="idvalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="info" class="form-label">Info</label>
      <input type="text" class="form-control @error('info') is-invalid @enderror" 
      id="info" name="info" placeholder="info" value="{{ old('info', $profile->info) }}"required autofocus >
      @error('info')
      <div class="idvalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div>
   
  <div class="mb-3">
    <label for="image" class="form-label">Foto Profile</label>
    <input type="hidden" name="oldImage" value="{{ $profile->image }}">
    @if($profile->image)
    <img src="{{ asset('storage/' . $profile->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" 
          name="image">
    @else
    @endif      
      @error('image')
      <div class="idvalid-feedback">
       {{ $message }}
    </div>  
  @enderror
</div>

  <div class="mb-3">
    <label for="nohp" class="form-label">Nomer HP</label>
    <input type="text" class="form-control @error('nohp') is-invalid @enderror" 
    id="nohp" name="nohp" placeholder="nohp" value="{{ old('nohp', $profile->nohp) }}"required autofocus >
    @error('nohp')
    <div class="idvalid-feedback">
     {{ $message }}
    </div>
    @enderror
    </div>

    <a href="/profile/profiles"class="btn btn-secondary">Exit</a>
    <button type="submit" class="btn btn-primary">Update Profile</button>
  
  </form>

      </div>
    </div>
  </div>

@endsection






