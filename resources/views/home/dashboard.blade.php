@extends('layouts.app-master')

@section('content')
    {{-- <div class="container">
        <div class="header">
            <div class="nav">
                <a href="{{ route('logout.perform') }}">
                    <button type="submit" class="btn-red">
                        <li>Logout</li>
                    </button>
                </a>
            </div>
            </form>
        </div>
    </div> --}}
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
        <div class="container-fluid">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User - Pagination</h1>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userDataPagination as $data)
                        <tr>

                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at }}</td>
                            {{-- @if (Auth::id() === $data->id)
                                    <td class="btn btn-danger" style="color: black"><a
                                            href="{{ route('delete', [$data->id]) }}">Delete</a></td>
                                @endif --}}
                            <td class="">
                                <a href="{{ route('delete', [$data->id]) }}">
                                    <button class="btn btn-xs btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $userDataPagination->links('vendor.pagination') !!}
            </div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User</h1>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $datas)
                        <tr>
                            <th scope="row">{{ $datas->id }}</th>
                            <td>{{ $datas->username }}</td>
                            <td>{{ $datas->email }}</td>
                            <td>{{ $datas->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
