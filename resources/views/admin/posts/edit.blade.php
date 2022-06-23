@extends('layouts.admin')

@section('content')
    <div class="container mb-5">
        <h2>Edit {{ $post->title }}</h2>

        {{-- Display error message in case of invalid data --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder=""
                    aria-describedby="titleHelp" value="{{ old('title', $post->title) }}">
                <small id="titleHelp" class="text-muted">Edit title (max. 150 characters)</small>
                {{-- Display specific error --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" placeholder=""
                    aria-describedby="authorHelp" value="{{ old('author', $post->author) }}">
                <small id="authorHelp" class="text-muted">Edit author (max. 40 characters)</small>
                {{-- Display specific error --}}
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="5">
                    {{ old('content', $post->content) }}
                </textarea>
                <small id="contentHelp" class="text-muted">Edit content</small>
            </div>

            {{-- Cover image --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="text" name="cover_image" id="cover_image" class="form-control" placeholder=""
                    aria-describedby="coverImageHelp" value="{{ old('cover_image', $post->cover_image) }}">
                <small id="coverImageHelp" class="text-muted">Edit cover image (max. 150 characters)</small>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary text-white">Edit Post</button>
        </form>
    </div>
@endsection
