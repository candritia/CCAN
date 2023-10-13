@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
        <h1 class="mb-3"> {{ $petugasan->title}}  </h1>
        
            <a href="/dashboard/posts"class="btn btn-success"><span data-feather="arrow-left"></span> Back To all My Posts</a>
            <a href="/dashboard/posts/{{ $petugasan->slug }}/edit"class="btn btn-warning"><span data-feather="edit"></span> Edit </a>
            <form action="/dashboard/posts/{{ $petugasan->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger "
                 onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span>Delete</button>
                </form>
                
                @if($petugasan->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $petugasan->image) }}" 
                          alt="{{ $petugasan->category->name }}" class="img-fluid mt-3">
                </div>
                @else
                 
                 <img src="https://source.unsplash.com/1200x400?{{ $petugasan->category->name }}" 
                      alt="{{ $petugasan->category->name }}" class="img-fluid mt-3">
                @endif

       
        
        <article class="my-3 fs-5x">

        {!! $petugasan->body !!}
        </article>
        </div>
    </div>
</div>

@endsection