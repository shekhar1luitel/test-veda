@extends('layouts.app-master')

@section('content')
    <div style="padding: 8px" class="container">
        <div class="header">
            <div class="nav">
                <div class= "nav"> <button class="btn-green">
                        <a href="{{ url('/blog') }}">
                            <li>Blog</li>
                        </a>
                    </button> </div>
                </form>
            </div>
        </div>
        <div class="content">
            <h1>Your Blog </h1>
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
