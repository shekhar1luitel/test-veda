@extends('layouts.app-master')

@section('content')
    <div class="container">
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
    </div>
    <div class="content">
        <h1>All Users with Pagination</h1>
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
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
                            <td class="btn btn-danger" style="color: black"><a
                                    href="{{ route('delete', [$data->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $userDataPagination->links('vendor.pagination') !!}
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $userDataPagination->links('vendor.pagination') !!}
        </div>

        <div class="content-2">
            <table class="content-2 title">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
