<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="dashboard_asset/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="dashboard_asset/images/favicon.png" type="image/x-icon">
    <title>Fastkart - log In</title>
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- iconscout CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/bootstrap.css') }}">
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/style.css') }}">
</head>

<body>

    <!-- login section start -->
    <section class="log-in-section section-b-space">
        <a href="" class="logo-login">
            <img src="{{ asset('dashboard_asset/images/logo/1.png') }}" class="img-fluid">
        </a>
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3 class="fw-bold">Welcome To {{ env('APP_NAME') }} </h3>
                            <h4 class="fw-bold">Log In Your Account</h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Email Address"
                                            value="{{ old('email') }}">
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <small class="text-danger fw-semibold">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form input-group">
                                        <input type="password" class="form-control @error('email') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                        <button class="btn btn-outline-primary border" type="button"
                                            id="togglePassword">
                                            <i class="uil uil-eye-slash" style="font-size: 20px;"></i>
                                        </button>
                                        @error('password')
                                            <small class="text-danger fw-semibold">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const togglePassword = document.querySelector('#togglePassword');
                                            const password = document.querySelector('#password');

                                            togglePassword.addEventListener('click', function() {
                                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                                password.setAttribute('type', type);
                                                // Toggle the eye icon
                                                if (type === 'password') {
                                                    togglePassword.innerHTML = '<i class="uil uil-eye-slash" style="font-size: 20px;"></i>';
                                                } else {
                                                    togglePassword.innerHTML = '<i class="uil uil-eye" style="font-size: 20px;"></i>';
                                                }
                                            });
                                        });
                                    </script>

                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault" name="remember">
                                            <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot
                                            Password?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center"
                                        type="submit">LogIn</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>
                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <i class="uil uil-google fs-3" style="color: #0062ff"></i>

                                        Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <i class="uil uil-github fs-2" style="color: #000000"></i>
                                        Log In with Github
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sign-up-box text-center d-flex justify-content-center align-items-center gap-2">
                            <h4 class="fw-bold pt-2" style="font-size: 13px">Already have an account? </h4>
                            <a class="fw-bold" style="font-size: 13px" href="{{ url('register') }}">
                                SignUp Now
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->
</body>

</html>
