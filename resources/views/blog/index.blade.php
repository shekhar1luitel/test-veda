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
        <h1>All Blog and Create</h1>
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
        <form action="{{ route('blog.search') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Author</th>
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
                            <td>{{ Str::words($data->detail, 20, '...') }}</td>
                            <td>{{ $data->user->username }}</td>
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
@endsection
