@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Create New Post</h2>

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

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder=""
                    aria-describedby="titleHelp" value="{{ old('title') }}" class="@error('title') is-invalid @enderror">
                <small id="titleHelp" class="text-muted">Edit title (max. 150 characters)</small>
                {{-- Display specific error --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" placeholder=""
                    aria-describedby="authorHelp" value="{{ old('author') }}" class="@error('author') is-invalid @enderror">
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
                    {{ old('content') }}
                </textarea>
                <small id="contentHelp" class="text-muted">Edit content</small>
            </div>

            {{-- Cover image --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="text" name="cover_image" id="cover_image" class="form-control" placeholder=""
                    aria-describedby="coverImageHelp" value="{{ old('cover_image') }}">
                <small id="coverImageHelp" class="text-muted">Edit cover image (max. 150 characters)</small>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary text-white">Create Post</button>
        </form>
    </div>
@endsection
