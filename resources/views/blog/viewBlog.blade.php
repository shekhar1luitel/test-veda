@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <button class="btn-green">
                    <li>Blog</li>
                </button>
                <a href="{{ route('logout.perform') }}">
                    <button type="submit" class="btn-red">
                        <li>Logout</li>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="container content-wrapper">
        <div class="content">
            <h1>{{ $data->name }}</h1>
            <h3>Author: {{ $data->user->username }}</h3>
            <div class="blog-details">
                <p>{{ $data->detail }}</p>
                <img src="{{ isset($data->image) ? url('storage/images/' . $data->image) : 'https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png' }}"
                    alt="img">
            </div>
        </div>

        <div class="related-posts">
            <h1>Related Posts</h1>
            @foreach ($BlogData as $blog)
                <div class="related-post">
                    <h2>{{ $blog->name }}</h2>
                    <h3>{{ Str::words($data->detail, 4, '...') }}</h3>
                    <a href="{{ route('blog.show.one', [$blog->id]) }}">View</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .blog-details img {
        max-width: 100%;
        height: auto;
        margin-top: 15px;
    }

    .related-posts {
        margin-top: 20px;
    }

    .related-posts h1 {
        color: #333;
    }

    .related-post {
        margin-bottom: 20px;
    }

    .related-post h2 {
        color: #333;
    }

    .related-post p {
        color: #666;
    }
</style>
