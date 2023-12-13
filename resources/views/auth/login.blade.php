    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Veda : Log In </title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link href="https://ingrails.com/school/admin_panel/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://veda-app.s3.ap-south-1.amazonaws.com/admin_panel/css/bootstrap.min.css" rel="stylesheet"
            type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
            rel="stylesheet">
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
                background: #fff !important;
                position: relative;
                font-size: 100%;
            }

            .login_contents_container {
                display: flex;

            }

            .login-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;

                width: 100%;
                overflow-x: hidden;
                font-family: 'Muli', sans-serif;
            }

            .loginBox {
                max-width: 600px;
                width: 100%;
                margin: 0 auto;
                display: flex;
                align-items: center;
                border-radius: 5px;
                margin-bottom: 4rem;
                padding: 140px 10px;

            }

            .loginBox .login-content {
                max-width: 520px;
                margin: 0 auto;
                width: 100%;
            }

            .login-form input {
                width: 100%;
                display: block;
                height: 40px;
                border: 1px solid #c5c5c5;
                box-shadow: none !important;
                outline: none !important;
                padding: 0 10px 0 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 7px #c0d5f5;
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
                border-radius: 8px;

            }

            ::placeholder {

                color: #7C7C7C !important;

            }

            .login-form button {
                width: 100%;
                display: block;
                height: 40px;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
                margin: 32px 0 32px 0;
                cursor: pointer;
                background: #4384e8;
                color: #fff;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 400;
                font-size: 15px;
                border-radius: 8px;
            }

            .login-form input::-webkit-input-placeholder {
                color: #555;
            }

            .login-form input::-moz-placeholder {
                color: #555;
            }

            .login-form input:-ms-input-placeholder {
                color: #555;
            }

            .login-form input:-moz-placeholder {
                color: #555;
            }

            .login-content .veda-logo {
                width: 100px;
                height: 100px;
                margin: 0 auto;
                display: block;
                object-fit: cover;
            }

            .error-message {
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

            label {
                font-family: 'Fira Sans', sans-serif !important;
                font-weight: 400;
                color: #545454;
            }
        </style>

        <section class="login-wrapper">

            <div class="main__container">

                <head>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
                        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer" />
                </head>
                <style>
                    .login_contents_container {
                        flex: 1;
                        position: relative;
                    }

                    label {
                        font-size: 14px;
                    }

                    .form-control {
                        background-color: #fff;
                    }

                    @media screen and (max-width:1650px) {
                        .loginBox {
                            padding: 40px 70px;
                        }
                    }

                    @media screen and (max-width:1470px) {


                        .loginBox {
                            padding: 40px 70px;
                        }
                    }

                    @media screen and (max-width:1550px) {
                        .login_contents_container {

                            align-items: center !important;
                        }
                    }


                    @media screen and (max-width:725px) {
                        .loginBox {
                            margin-bottom: 6rem;
                        }
                    }
                </style>
                <div class="login_contents_container">
                    <section class="loginBox" id="loginBox">
                        <div class="login-content">
                            <img src="https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png"
                                alt="Veda" class="veda-logo">
                            <h3
                                style=" color:#0B0B0B;font-weight: 400;text-align: center;margin-top: 32px;margin-bottom: 32px; font-family:'Fira Sans', sans-serif !important;">
                                Login to Veda</h3>
                            <div class="error-message" style="display: none">
                                <p class="p">
                                </p>
                            </div>
                            <form action="{{ route('login.perform') }}" method="post" class="login-form">
                                @csrf
                                @include('layouts.partials.messages')
                                <label>Email</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Email / Username" required />
                                @if ($errors->has('username'))
                                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                @endif
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Password Here" required />
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif


                                <button class="submit-btn" type="submit">Log in</button>
                            </form>
                            <a style="color: #474747; font-weight:400" class="link-help" href="{{url('register')}}">Register New
                                Account</a>

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </body>

    </html>
