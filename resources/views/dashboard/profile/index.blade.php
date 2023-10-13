@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Postingan Profile</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="container ">
    <div class="row">
        <!-- Button trigger modal -->
      
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Foto Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <div class="col-lg-12">
                  

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
                  
                            
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create Profile</button>
                      </div>
                    </form>
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="container">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span data-feather="edit-2"></span> Buat Profile
  </button>
  <a href="/profiles"class="btn btn-warning"><span data-feather="eye"></span>Profile Petugas</a>
  <div class="table-responsive col-lg-12">

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">No hp</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($profiles as $profile)
        <tr>
          <td>{{ $loop->iteration }}</td>  
          <td>{{ $profile->nama }}</td>
          <td>{{ $profile->nohp }}</td>
          <td>
            <a href="/profile/profiles/{{ $profile->id }}" class="badge bg-info">
              <span data-feather="eye"></span></a>

            <a href="/profile/profiles/{{ $profile->id }}/edit" class="badge bg-warning">
            <span data-feather="edit"></span></a>
            <form action="/profile/profiles/{{ $profile->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0"
               onclick="return confirm('Apakah Anda Ingin Meng Hapusnya?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
            
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection


