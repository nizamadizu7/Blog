@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ $title}}</h2>

    <div class="row">
        @foreach ($categories as $item)
            <div class="col-md-4 ">
                <a href="/blog?category={{ $item->slug }}">
                    <div class="card bg-dark text-white">
                        <img src="/img/card.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-center p-3" style="background-color: rgba(206, 204, 204, 0.3)">{{ $item->name }}</h5>
                        </div>
                    </div>        
                </a>
            </div>
        @endforeach
    </div>
</div>
    
@endsection