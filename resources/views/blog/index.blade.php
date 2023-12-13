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
    <div class="content">
        <h1>All Blog </h1>
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($BlogData as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->detail }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td class="btn btn-danger" style="color: black"><a
                                    href="{{ route('deleteBlog', [$data->id]) }}">Delete</a></td>
                            <td class="btn btn-danger" style="color: black"><a
                                    href="{{ route('updateBlog', [$data->id]) }}">Update</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="content">
        <h1>Create Blog</h1>
        <div class="container mt-5">
            <form action="{{ route('blog.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="user_id" value="{{ Auth::id() }}" type="hidden">
                <label for="name">Title</label>
                <input name="name" type="name">
                <label for="name">Description</label>
                <input name="detail" type="description">
                <input type="file" name="image">
                <button class="btn btn-green" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
