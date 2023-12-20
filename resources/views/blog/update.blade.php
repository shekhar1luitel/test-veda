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
                    <form action="{{ route('updateBlog', [$updateData]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" value="{{ Auth::id() }}" type="hidden">

                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control" name="categories" required>
                                @foreach ($Category as $data)
                                    <option {{ $data->id === $BlogData->category_id ? 'selected' : '' }}
                                        value="{{ $data->id }}">
                                        {{ $data->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input class="form-control" name="name" value="{{ $BlogData->name }}" type="text">
                        </div>

                        <div class="form-group">
                            <label for="detail">Description</label>
                            <input class="form-control" name="detail" value="{{ $BlogData->detail }}" type="text">
                        </div>

                        <div class="form-group">
                            <label for="headImage">Blog Thumbnail</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="image">Blog Image</label>
                            <input class="form-control" type="file" name="blogImage[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Select to Remove</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($blogImage as $data)
                                    <div class="mr-2 mb-2">
                                        <img class="img-thumbnail" style="width: 75px; height: 75px;" src="{{ isset($data->image_path) ? url('storage/blog_images/' . $data->image_path) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}" alt="">
                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="remove_image_{{ $data->id }}" name="remove_image[]" value="{{ $data->id }}">
                                            <label class="custom-control-label" for="remove_image_{{ $data->id }}"></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="blogImage[]" multiple>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
