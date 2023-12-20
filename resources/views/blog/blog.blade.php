@extends('layouts.app-master')

@section('content')
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($BlogData as $data)
                    <div class="col-md-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg"
                                            alt="">
                                        <span class="username">
                                            <a href="#">{{ $data->user->username }}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">{{ $data->created_at }}</span>
                                    </div>
                                    <p class="text-bold">{{ $data->name }}</p>
                                    <p>{{ $data->detail }}</p>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <img class="img-fluid"
                                                src="{{ isset($data->image) ? url('storage/images/' . $data->image) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                                                alt="Blog Photo">
                                        </div>
                                        {{-- blog_image --}}
                                        <div class="col-sm-6">
                                            <div class="row">
                                                @foreach ($allBlogImages as $image)
                                                    @if ($image->blog_id === $data->id)
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid"
                                                                src="{{ isset($image->image_path) ? url('storage/blog_images/' . $image->image_path) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                                                                alt="Blog Image">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('blog.show.one', [$data->id]) }}">
                                            <button type="button" class="btn btn-success float-right"><i
                                                    class="far fa-credit-card"></i> View
                                            </button>
                                        </a>
                                        <a href="{{ route('deleteBlog', [$data->id]) }}">
                                            <button type="button" class="btn btn-danger float-right"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-download"></i> Delete
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
