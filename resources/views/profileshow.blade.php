@extends('dashboard.layouts.main')

@section('container')
      <div class="container">    
        <div class="contaner mt-3 mb-3">
            <a href="/profiles"class="btn btn-secondary"><span data-feather="arrow-left"></span> Back To all My profiles</a>           
        </div>
    <div class="container-fluid p-0">
           <div class="pt-5 text-center">
            <img src="/storage/{{  $profile->image }}" class="rounded-circle img-thumbnail" alt="" width="250" height="250">
           </div>
             <table class="table table-striped mt-2" style="100%">
              <thead>
              <tr>
               <td>Nama</td>
              </tr>
            </thead>
              <tr>
               <th>{{ $profile->nama }}</th>
              </tr>
              </table>   
             <table class="table table-striped mt-2" style="100%">
              <thead>
              <tr>
               <td>Info</td>
              </tr>
            </thead>
              <tr>
               <th>{{ $profile->info }}</th>
              </tr>
              </table>   
             <table class="table table-striped mt-2" style="100%">
              <thead>
              <tr>
               <td>NO HP</td>
              </tr>
            </thead>
              <tr>
               <th>{{ $profile->nohp }}</th>
              </tr>
              </table>   
         


{{-- <div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="h2">Haloo, {{ auth()->user()->name }}</h1>
        
            <a href="/profile/profiles"class="btn btn-success"><span data-feather="arrow-left"></span> Back To all My profiles</a>
            <a href="/profile/profiles/{{ $profile->id }}/edit"class="btn btn-warning"><span data-feather="edit"></span> Edit </a>
            <form action="/profile/profiles/{{ $profile->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger "
                 onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span>Delete</button>
                </form>
                @if ($profile->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/'. $profile->image) }}" 
                          alt="{{ $profile->nama}}" class="img-fluid mt-3">
                </div>
                @endif
                <h6 class="card-title">{{ $profile->nama }}</h6>
                    <h3 class="card-title">{{ $profile->info }}</h3>
                
                
        
        <article class="my-3 fs-5x">
        {!! $profile->body !!}
        </article>
        </div>
    </div>
</div> --}}

@endsection