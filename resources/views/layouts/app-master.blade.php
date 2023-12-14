<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1,
        h2 {
            color: #444;
        }

        div>.brand-name>h1 {
            color: aquamarine;
            font-size: 30px;
            padding: 2px;
        }

        h3 {
            color: #999;
        }

        .btn-red {
            background: #f05462;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }

        .btn-red:hover {
            color: #f05462;
            background: white;
            padding: 3px 8px;
            border: 2px solid #f05462;
        }

        .btn-green {
            background: #54f057;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }

        .btn-green:hover {
            color: #54f057;
            background: white;
            padding: 3px 8px;
            border: 2px solid #54f057;
        }

        .error-message , .alert-danger {
            padding: 10px 10px 10px 20px;
            background: #de1818;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .error-message p {
            margin: 0;
            font-size: 15px;
            color: #fff;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px;
            border-bottom: 2px solid #999;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        table {
            padding: 10px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        .side-menu {
            position: fixed;
            background: black;
            width: 20vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .side-menu .brand-name {
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .side-menu .brand-name:hover {
            color: purple;
        }

        .side-menu li,
        span {
            font-size: 24px;
            padding: 10px 40px;
            color: white;
            display: flex;
            align-items: center;
        }

        .side-menu li:hover,
        span:hover {
            background: white;
            color: black;
        }

        .container {
            position: absolute;
            right: 0;
            width: 80vw;
            height: 100vh;
            background: #f1f1f1;
        }

        .container .header {
            position: fixed;
            top: 0;
            right: 0;
            width: 80vw;
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .container .header .nav {
            width: 90%;
            display: flex;
            align-items: center;
        }


        .container .header .nav .user {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 2%;
        }

        .container .content {
            position: relative;
            margin-top: 10vh;
            min-height: 90vh;
            background: #f1f1f1;
        }

        .container .content .cards {
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .container .content .cards .card {
            width: 250px;
            background: white;
            margin: 20px 10px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error-info {
            color: #d9534f;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .login-form div {
            margin-bottom: 15px;
        }

        .alert, .alert-success {
                padding: 10px 10px 10px 20px;
                background: #0adc3f;
                margin-bottom: 20px;
                border-radius: 4px;
            }

            .success-message p {
                margin: 0;
                font-size: 15px;
                color: #fff;
            }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        @media screen and (max-width: 1050px) {
            .side-menu li {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 940px) {
            .side-menu li span {
                font-size: 16px;
            }

            .side-menu {
                align-items: center;
            }

            .side-menu li:hover {
                background: #fff;
                padding: 8px 38px;
                border: 2px solid white;
            }

            .brand-name {
                font-size: 19px;
            }

            span {
                font-size: 18px;
            }

        }

        @media screen and (max-width:536px) {
            .brand-name {
                font-size: 15px;
            }

            .container .content .cards {
                justify-content: center;
            }

            span {
                font-size: 15px;
            }

        }


        .container .content .content-2 {
            min-height: 60vh;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .container .content .content-2 .recent-payments {
            min-height: 50vh;
            flex: 5;
            background: white;
            margin: 0 25px 25px 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: flex;
            flex-direction: column;
        }

        .container .content .content-2 .new-students {
            flex: 2;
            background: white;
            min-height: 50vh;
            margin: 0 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: flex;
            flex-direction: column;
        }

        .container .content .content-2 .new-students table td:nth-child(1) img {
            height: 40px;
            width: 40px;
        }

        @media screen and (max-width: 1050px) {
            .side-menu li {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 940px) {
            .side-menu li span {
                display: none;
            }

            .side-menu {
                align-items: center;
            }

            .side-menu li img {
                width: 40px;
                height: 40px;
            }

            .side-menu li:hover {
                background: #f05462;
                padding: 8px 38px;
                border: 2px solid white;
            }
        }

        @media screen and (max-width:536px) {
            .brand-name h1 {
                font-size: 16px;
            }

            .container .content .cards {
                justify-content: center;
            }

            .side-menu li img {
                width: 30px;
                height: 30px;
            }

            .container .content .content-2 .recent-payments table th:nth-child(2),
            .container .content .content-2 .recent-payments table td:nth-child(2) {
                display: none;
            }
        }
    </style>
</head>

<body>

    @include('layouts.partials.navbar')

    <main style="padding-left: 5px" class="container">
        @yield('content')
    </main>
</body>

</html>
