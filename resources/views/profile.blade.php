@extends('dashboard.layouts.main')


 @section ('container')
 <div class="container bg-white">
 
 <div class="container">
   <div class="row">
    <div class="container">
    {{-- <div class="row text-center  flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-3 border-bottom">
    <h3 class="text-center">Profile Petugas Progres Ticket CCAN</h3>
    </div> --}}
    <div class="row justify-content-center mb-3 mt-3">
      <div class="col-md-12">
        <form action="/profiles">
 
          @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
              
          @endif
 
          <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Search" name="search"
            value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>
    
</div>
        @if ($profiles->count())
   <center>
     <div class="card col-md-4 mb-3 p-5 p-md-3 border rounded-3 bg-light">      
       @if($profiles[0]->image)
       <div style="max-height:500px; overflow:hidden;">
         <img src="{{ asset('storage/' . $profiles[0]->image) }}" 
         alt="{{ $profiles[0]->nama}}" 
         class="img-fluid mt-3 bd-placeholder-img rounded-circle img-thumbnail card-img-top" alt="" width="140" height="140">
       </div>
       @endif
         <div class="card-body text-center">
          <h5 class="card-title">{{ $profiles[0]->author->name }}</h5>
          
          <p> 
            <small class="text-muted">
            {{ $profiles[0]->created_at->diffForHumans( ) }}
          </small>
          </p>
          
          {{-- <p class="card-text">{{ $profiles[0]->info }}</p> --}}
          <a href="/profiles/{{ $profiles[0]->id }}" class="btn btn-primary">Lihat Profile</a>
        </div>
       </div>  
</center>
       <div class="container">
        <div class="row">
            @foreach ($profiles->skip(1) as $profile)
          
           
            <div class="col-md-4 mb-3">
                <div class="card p-5 p-md-3 border rounded-3 bg-light" style="">
                  <div class="container-fluid p-0">
                        @if($profile->image)
                            <img src="{{ asset('storage/' . $profile->image) }}" 
                          alt="{{ $profile->nama}}" class="img-fluid mt-3 bd-placeholder-img rounded-circle img-thumbnail card-img-top" alt="" width="140" height="140">
                        @endif
                    
                        <div class="card-body">
                      <h5 class="card-title">{{ $profile->author->name }}</h5>
                      <p> 
                        <small class="text-muted">
                        {{ $profile->created_at->diffForHumans( ) }}
                      </small>
                      </p>
                      {{-- <p class="card-text">{{ $profile->info }}</p> --}}
                      <a href="/profiles/{{ $profile->id }}" class="btn btn-primary">Lihat Profile</a>
                    </div>
                  </div>
                  </div>
            </div> 
           @endforeach            
        </div>
      </div>
      @else
             <p class="text-center fs-4">No Profile found.</p>       
        @endif
  
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-end">
  {{ $profiles->links() }}
</div>
@endsection



    {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-4">
    <h2> <a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>

    <p>By <a href="/authors/{{ $post->author->username }}"class="text-decoration-none">{{ $post->author->name }}</a> In <a href="/categories/{{ $post->category->slug }}"
        class="text-decoration-none"> {{ $post->category->name }}</a></p>

    <p>  {{ $post->excerpt }} </p>

    <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more</a>

    </article>
    @endforeach --}}



