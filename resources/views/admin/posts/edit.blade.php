@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit {{ $post->title }}</h2>
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder=""
                    aria-describedby="titleHelp" value="{{ old($post->title) }}">
                <small id="titleHelp" class="text-muted">Edit title (max. 150 characters)</small>
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" placeholder=""
                    aria-describedby="authorHelp" value="{{ old($post->author) }}">
                <small id="authorHelp" class="text-muted">Edit author (max. 40 characters)</small>
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="5">
                    {{ old($post->content) }}
                </textarea>
                <small id="contentHelp" class="text-muted">Edit content</small>
            </div>

            {{-- Cover image --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="text" name="cover_image" id="cover_image" class="form-control" placeholder=""
                    aria-describedby="coverImageHelp" value="{{ old($post->cover_image) }}">
                <small id="coverImageHelp" class="text-muted">Edit cover image (max. 150 characters)</small>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary text-white">Edit Post</button>
        </form>
    </div>
@endsection
