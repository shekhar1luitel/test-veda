@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="nav">
                    <button class="btn-green">
                        <li>User</li>
                    </button>
                </div>
            </div>
        </div>
        <div class="content">
            <h1>Search Results</h1>
            <p>Showing results for: {{ $search }}</p>
            <div class="cards">
                @forelse ($searchdata as $data)
                <div style="padding: 10px" class="card">
                    <div class="box">
                        <img style="height:200px; width:100%;"
                            src="{{ isset($data->image) ? url('storage/images/' . $data->image) : 'https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg' }}"
                            alt="image">
                        <h1 style="font-size: 1.4rem;">{{ $data->username }}</h1>
                        <h3 style="padding-bottom: 32px;">{{ $data->email }}</h3>
                        <div style="padding-bottom: 5px;">
                            <button class="btn btn-red"><a
                                    href="{{ route('delete', [$data->id]) }}">Delete</a></button>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No results found</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
