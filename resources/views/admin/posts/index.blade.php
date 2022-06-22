@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>cover_image</th>
                    <th>slug</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td scope="row">{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td><img width="120" src="{{ $post->cover_image }}" alt="cover image"></td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm text-white"
                                href="{{ route('admin.posts.show', $post) }}">View</a>
                            <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row">Nothing to show yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
