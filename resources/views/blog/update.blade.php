@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class= "nav"> <button class="btn-green">
                    <a href="{{url('/blog')}}"><li>Blog</li></a>
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
    {{-- @dd($BlogData) --}}
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
                <label for="name">Title</label>
                <input name="name" value="{{ $BlogData->name }}" type="name">
                <label for="name">Description</label>
                <input name="detail" value="{{ $BlogData->detail }}" type="description">
                <input type="file" name="image">
                <button class="btn btn-green" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
