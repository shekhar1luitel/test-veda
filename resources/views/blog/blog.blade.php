@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class= "nav"> <button class="btn-green">
                        <li>Blog</li>
                    </button> </div>
                </form>
            </div>
        </div>
        <div class="content">
            <h1>Your Blog </h1>
            <div class="content">
                <div class="cards">
                    @foreach ($BlogData as $data)
                        <div class="card">
                            <div class="box">
                                <h1>{{ $data->name }}</h1>
                                <h3>{{ $data->detail }}</h3>
                                <img style="height:30px; wight:30px;" src="{{isset($data->image)? url('storage/images/'.$data->image) : 'https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png'}}" alt="image">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
