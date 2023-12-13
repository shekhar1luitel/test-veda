@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class= "nav"> <button class="btn-green">
                        <li>Blog</li>
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
        <div class="container mt-5">
            <form action="{{ route('updateBlog', [1]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="user_id" value="{{ Auth::id() }}" type="hidden">
                <label for="name">Title</label>
                <input name="name" value="{{$BlogData->name}}" type="name">
                <label for="name">Description</label>
                <input name="detail" value="{{$BlogData->name}}" type="description">
                <input type="file"  name="image">
                <button class="btn btn-green" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
