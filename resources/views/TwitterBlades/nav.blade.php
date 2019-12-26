@extends('TwitterBlades.default')

@section('content')

    <style>
        .navbar {
            position: fixed;
        }

        .w3-sidebar {

            margin-top: 85px;

        }

        #search {

            margin-top: 50px;
            margin-left: 900px;
        }
    </style>

    <div class="navbar navbar-expand-sm  navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('homeTwitter')}}">
                <img src="/twitter.jpg" width="100px" height="80px">
            </a>
{{--            <input type="text" placeholder="Search Twitter" id="search" aria-label="Search">--}}
        </div>

    </div><br>

    <style>

        .w3-sidebar {
            margin-left: 20px;
            font-size: 20px;
        }

        a {
            font-family: 'Nunito', sans-serif;
            color: black;
        }

        a:hover {

            text-decoration: none;
        }

        .navbar-header a:hover {
            color: white;
        }

        .form-inline {

            margin-top: 50px;
            margin-left: 1000px;
        }

        .navbar {
            margin-top: -29px;
        }

    </style>

    <div class="w3-sidebar w3-bar-block" style="width:15%">

        <a href="{{route('homeTwitter')}}" class="w3-bar-item w3">Home</a>
        <a href="{{route('homeTwitter')}}" class="w3-bar-item w3">List</a>
        <a href="{{route('profileview')}}" class="w3-bar-item w3">Profile</a>
        <a href="#" class="w3-bar-item w3">More</a>

    </div>

    <div style="margin-left:20%">

        <div class="w3-container">

        </div>

    </div>


@endsection
