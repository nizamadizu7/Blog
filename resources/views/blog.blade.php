@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-3">{{ $title }}</h2>
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Search ..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>



    @if ($posts->count())
            <div class="card mb-3">
                <a href="/blog/{{ $posts[0]->slug }}" class=" text-dark text-decoration-none">
                    @if ($posts[0]->image)
                        <div style="max-height: 400px; overflow:hidden">
                            <img src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->title }}" class="img-fluid">
                        </div>
                    @else
                        <img src="/img/jumbotron.jpg" class="card-img-top img-fluid mt-3" alt="...">
                    @endif
                    <div class="card-body">
                            <h3 class="card-title text-dark text-decoration-none">{{ $posts[0]->title }}</h3>
                            {{-- <small>By : <a class="text-decoration-none" href="/blog?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }} </a>in <a class="text-decoration-none" href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></small> --}}
                            <br></br>
                            <p class="card-text">{{ $posts[0]->excerpt}}</p>
                            <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
                        
                    </div>
                </a>
            </div>
            <div class="row">
                @foreach ($posts->skip(1) as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="rounded  position-absolute px-3 py-2" style="background-color: rgba(231, 228, 228, 0.418)"><a class="text-decoration-none text-white"href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a></div>
                            <a href="/blog/{{ $item->slug }}" class=" text-dark text-decoration-none">
                                @if ($item->image)
                                    <div style="max-height: 400px; overflow:hidden">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="img-fluid">
                                    </div>
                                @else
                                    <img src="/img/card.jpg" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    {{-- <small>By : <a class="text-decoration-none" href="/blog?user={{ $item->user->username }}">{{ $item->user->name }} </a>in <a class="text-decoration-none" href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a></small> --}}
                                    <br></br>
                                    <p>{{ $item->excerpt}}</p>
                                    <a href="/blog/{{ $item->slug }}" class="btn btn-primary">read More ...</a>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-end">
                {{ $posts->links() }}
            </div>
        </div>
        @else
        <p class="text-center fs-4">Post Not Found</p>    
        @endif
</div>
@endsection