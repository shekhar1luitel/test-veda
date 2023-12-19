@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class= "nav"> <button class="btn-green">
                        <a href="{{ url('/blog') }}">
                            <li>Blog</li>
                        </a>
                    </button> </div>
                <a href="{{ route('logout.perform') }}">
                    <button type="submit" class="btn-red">
                        <li>Logout</li>
                    </button>
                </a>
            </div>
            </form>
        </div>
    </div>
    <div class="content">
        <h1>Update Blog</h1>
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
        <div class="container mt-5">
            <form action="{{ route('updateBlog', [$updateData]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="user_id" value="{{ Auth::id() }}" type="hidden">
                <label for="categories">Categories</label>
                <select name="categories" type="name" required>
                    @foreach ($Category as $data)
                        <option {{ $data->id === $BlogData->category_id ? 'selected' : '' }} value="{{ $data->id }}">
                            {{ $data->category_name }}</option>
                    @endforeach
                </select>
                <label for="name">Title</label>
                <input name="name" value="{{ $BlogData->name }}" type="name">
                <label for="name">Description</label>
                <input name="detail" value="{{ $BlogData->detail }}" type="description">
                <label for="headImage">Blog Thumbnail</label>
                <input type="file" name="image">
                <div style="padding: 5px">
                    <label for="image">Blog Image</label>

                    <legend>Select to Remove</legend>
                    @foreach ($blogImage as $data)
                        <img style="height:50px; width:50px;"
                            src="{{ isset($data->image_path) ? url('storage/blog_images/' . $data->image_path) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                            alt="">
                        <input style="width: 40px;" type="checkbox" name="remove_image[]" value="{{ $data->id }}"
                            id="">
                    @endforeach
                </div>
                <input type="file" name="blogImage[]" multiple>
                <button class="btn btn-green" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
