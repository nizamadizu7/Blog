@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row my-5">
        <div class="col">
            <h2>{{ $post->title}}</h2>
            {{-- <small>By :<a class="text-decoration-none" href="/blog?user={{ $post->user->username }}">{{ $post->user->name }} </a> in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small> --}}
            @if ($post->image)
                <div style="max-height: 400px; overflow:hidden">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="/img/jumbotron.jpg" class="card-img-top img-fluid mt-3" alt="...">
            @endif
            <p>{!! $post->content !!}</p>
        <a href="/blog">back</a>
        </div>
    </div>
</div>
@endsection