@extends('dashboard.layouts.main')

@section('content')

<div class="row my-3">
    <div class="col-lg-8">

        <h2>{{ $post->title}}</h2>
        <a href="/dashboard/post" class="btn btn-success text-decoration-none">Back</a>
        <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none">Edit</a>
        <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger text-decoration-none" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
        @if ($post->image)
            <div style="max-height: 400px; overflow:hidden">
                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="img-fluid mt-3">
            </div>
        @else
            <img src="/img/jumbotron.jpg" class="card-img-top img-fluid mt-3" alt="...">
        @endif
        <p>{!! $post->content !!}</p>
    </div>
</div>
    
@endsection