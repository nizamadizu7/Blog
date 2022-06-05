@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('About Me') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, deleniti? Magnam commodi placeat odit. Commodi doloribus molestias magnam maxime quia recusandae dolorum dicta reprehenderit? Aliquam tenetur rerum sit soluta fugit!</h5>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
