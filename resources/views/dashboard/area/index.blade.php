@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Table Data Area</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="container ">
    <div class="row">
      <div class="col-md-6">
      
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Area</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="col-lg-12">             
                  <form method="post" action="/dashboard/areas" class="mb-5" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Area</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                        id="name" name="name" value="{{ old('name') }} "required autofocus>
                        @error('name')
                        <div class="idvalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Area</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    

  <div class="table-responsive col-lg-12">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Create New Area
    </button>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Area</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($areas as $area)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $area->name }}</td>
          <td>
          <a href="/dashboard/areas/{{ $area->id }}/edit" class="badge bg-warning">
            <span data-feather="edit"></span></a>

            <form action="/dashboard/areas/{{ $area->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0"
             onclick="return confirm('Apakah Anda Ingin Meng Hapus nya?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
            
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3 mb-3">
      {{ $areas->links() }}
    </div>
  </div>
  </div>
</div>
  </div>
@endsection


