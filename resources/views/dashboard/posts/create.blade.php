@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 ">Input Data Progres Ticket CCAN</h1>
  </div>
<div class="card mb-2 mt-3 col-md-6">
    <div class="card-header bg-danger text-white">
        <i class="fas fa-table me-1"></i>
        Input Data Progres Ticket CCAN
    </div>
    <div class="card-body">
    <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        @csrf

        {{-- <div class="mb-3">
          <label for="ticket" class="form-label">Ticket</label>
          <input type="text" class="form-control @error('ticket') is-invalid @enderror" 
          id="ticket" name="ticket" value="{{ old('ticket') }}"required autofocus >
          @error('ticket')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div> --}}
        <div class="mb-3">
          <label for="nama_costemer" class="form-label">Nama Custemer</label>
          <input type="text" class="form-control @error('nama_costemer') is-invalid @enderror" 
          id="nama_costemer" name="nama_costemer" placeholder="custemer" value="{{ old('nama_costemer') }}"required autofocus>
          @error('nama_costemer')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nama_pic" class="form-label">Nama Pic</label>
          <input type="text" class="form-control @error('nama_pic') is-invalid @enderror" 
          id="nama_pic" name="nama_pic" placeholder="nama pic" value="{{ old('nama_pic') }}"required>
          @error('nama_pic')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="tgl" class="form-label">Tanggal</label>
          <input type="date" class="form-control @error('tgl') is-invalid @enderror" 
          id="tgl" name="tgl" placeholder="tanggal" value="{{ old('tgl') }}"required>
          @error('tgl')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div>
        {{-- <div class="mb-3">
          <label for="service_id" class="form-label">Service ID</label>
          <input type="text" class="form-control @error('service_id') is-invalid @enderror" 
          id="service_id" name="service_id" value="{{ old('service_id') }}"required  >
          @error('service_id')
          <div class="idvalid-feedback">
           {{ $message }}
          </div>
          @enderror
        </div> --}}
        <div class="mb-3">
          <label for="area" class="form-label">Pilih Area</label>
           <select class="form-select" for="area" name="area_id" id="area" class="form-control" value="{{ old('area') }}"required>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
            @endforeach
              </select>           
        </div>
        <div class="mb-3">
          <label for="petugasan" class="form-label">Pilih Petugas</label>
           <select class="form-select" for="petugasan" name="petugasan_id" id="petugasan" class="form-control" value="{{ old('petugasan') }}"required>
            @foreach ($petugasans as $petugasan)
            <option value="{{ $petugasan->id }}" selected>{{ $petugasan->name }}</option>
            @endforeach

          </select>           
        </div>
          
        <div class="mb-3">
          <label for="perbaikan" class="form-label">Pilih Perbaikan</label>
           <select class="form-select" for="perbaikan" name="perbaikan_id" id="perbaikan" class="form-control" value="{{ old('perbaikan') }}"required>
            @foreach ($perbaikans as $perbaikan)
            <option value="{{ $perbaikan->id }}" selected>{{ $perbaikan->name }}</option>
            @endforeach

              </select>           
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Pilih Type</label>
            <select class="form-select" name="category_id"  >
                @foreach ($categories as $category)
                
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                
                @endforeach
              </select>
          </div>
          <div class="mb-3">
            <label for="statusa" class="form-label">Pilih Status</label>
            <select class="form-select" name="statusa_id"  >
                @foreach ($statusas as $statusa)
                
                <option value="{{ $statusa->id }}" selected>{{ $statusa->name }}</option>
                
                @endforeach
              </select>
          </div>
          <a href="/dashboard/posts"class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary">Create Postingan</button>
        </div>
      </form>
      </div>
    </div>


@endsection




