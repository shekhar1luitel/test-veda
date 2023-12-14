<!-- resources/views/search_results.blade.php -->

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
                    <div class="card">
                        <div class="box">
                            <h1>{{ $data->username }}</h1>
                            <h3>{{ $data->email }}</h3>
                            <a  href="{{ route('delete', [$data->id]) }}">Delete</a>
                        </div>
                    </div>
                @empty
                    <p>No results found</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
