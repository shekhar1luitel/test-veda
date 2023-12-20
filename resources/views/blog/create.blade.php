@extends('layouts.app-master')

@section('content')
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
    <div class="content">
        <div class="container-fluid">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Blog Create</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" value="{{ Auth::id() }}" type="hidden">
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" name="categories" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {!! str_repeat('&nbsp;', 4 * $loop->depth) !!}{{ $category->category_name }}
                                    </option>
                                    @if ($category->children)
                                        @include('layouts.partials.categories', ['categories' => $category->children])
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input class="form-control" name="name" type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="detail">Description</label>
                            <input class="form-control" name="detail" type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="headImage">Blog Thumbnail</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="image">Blog Image</label>
                            <input class="form-control" type="file" name="blogImage[]" multiple>
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
