@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">

                <a href="{{ route('logout.perform') }}">
                    <button type="submit" class="btn-red">
                        <li>Logout</li>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="container content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div style="padding: 30px" class="content">
            <h1>{{ $data->name }}</h1>
            <h3>Author: {{ $data->user->username }}</h3>
            <div class="blog-details">
                <p>{{ $data->detail }}</p>
                <div>
                    <img style="width:50%"
                        src="{{ isset($data->image) ? url('storage/images/' . $data->image) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                        alt="img">
                </div>
                <div class="title"></div>
                <div class="conatiner" style="display:flex;padding:20px; justify-items:end; flex-wrap: wrap;">
                    @foreach ($blogImage as $data)
                        <div class="cards" style="display: block">
                            <div style="padding: 10px" class="card">
                                <div class="box">
                                    <h3 class="title">Blog's Image {{$loop->iteration}}</h3>
                                    <img style="object-fit:fill"
                                        src="{{ isset($data->image_path) ? url('storage/blog_images/' . $data->image_path) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                                        alt="img">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <h3 class="title">Some Related Post</h3>

        <div class="content">
            <div class="cards">
                @foreach ($BlogData as $data)
                    <div style="padding: 10px" class="card">
                        <div class="box">
                            <img style="height:200px; width:100%;"
                                src="{{ isset($data->image) ? url('storage/images/' . $data->image) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                                alt="image">
                            <h1 style="font-size: 1.4rem;">{{ $data->name }}</h1>
                            <h2 style="font-size: 1.1rem;
                            padding-bottom: 10px;">Author:
                                {{ $data->user->username }}</h2>
                            <h3 style="padding-bottom: 32px;">{{ Str::words($data->detail, 20, '...') }}</h3>
                            <div style="padding-bottom: 5px;">
                                <button class="btn btn-green"><a
                                        href="{{ route('blog.show.one', [$data->id]) }}">View</a></button>
                                <button class="btn btn-red"><a
                                        href="{{ route('deleteBlog', [$data->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<style>
    h1 {
        color: #333;
    }

    h3 {
        color: #666;
        margin-bottom: 20px;
    }

    .blog-details p {
        line-height: 1.6;
        color: #333;
    }

    .blog-details img {
        max-width: 100%;
        height: auto;
        margin-top: 20px;
        border-radius: 5px;
    }
</style>
