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
        <h1>Create Blog</h1>
        @if ($errors->any())
            <div class="error-message alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div style="padding-left: 5px" class="container mt-5">
            <form action="{{ route('blog.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="user_id" value="{{ Auth::id() }}" type="hidden">
                <label for="categories">Categories</label>
                <select name="categories" type="name" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @if ($category->children)
                            @include('layouts.partials.categories', [
                                'categories' => $category->children,
                                'level' => 1,
                            ])
                        @endif
                    @endforeach
                </select>
                <label for="name">Title</label>
                <input name="name" type="name" required>
                <label for="name">Description</label>
                <input name="detail" type="description" required>
                <label for="headImage">Blog Thumbnail</label>
                <input type="file" name="image">
                <label for="image">Blog Image</label>
                <input type="file" name="blogImage[]" multiple>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
