@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-6">
    <form method="POST" action="/dashboard/post/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$post->title) }}" required>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$post->slug) }}"readonly>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                @if (old('category',$post->category_id)==$category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
            @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="d-block img-preview img-fluid mb-3 col-sm-5">
                
            @else
            <img  class="img-preview img-fluid mb-3 col-sm-5">
                
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Body</label>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="content" type="hidden" name="content" value="{{ old('content',$post->content) }}">
            <trix-editor input="content"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    // cara tradisional
    // title.addEventListener('keyup', function(e) {
    //     slug.value = title.value.toLowerCase().replace(/ /g, '-');
    // });

    // pakai eloquent sluggable
    title.addEventListener('keyup', function() {
        if(title.value===''){
            slug.value = '';
        }else{
        fetch("/dashboard/post/checkSlug?title=" + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);    
        }    
    });

    // hilangkan file atach trix editor
    document.addEventListener('trix-file-accept', function(event) {
        event.preventDefault();
    });

    //image preview
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const reader = new FileReader();

        reader.readAsDataURL(image.files[0]);

        reader.onload = function(oFRevent){
            imgPreview.src = oFRevent.target.result;
        }
    }

</script>
@endsection