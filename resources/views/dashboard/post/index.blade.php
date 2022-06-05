@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
   {{session('success')}}
  </div>
@endif
<a href="/dashboard/post/create" class="btn btn-primary mb-3"> Tambah Data</a>
<div class="table-responsive col-lg-8">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">category</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/post/{{ $post->slug }}" class="badge bg-info text-decoration-none">View</a>
                    <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
                  <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
    
@endsection