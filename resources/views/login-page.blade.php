<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>{{ __('login.page_title') }}</title>
</head>
<body>
    <div class="loader-wrapper">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <main class="inner-wrapper login-body">
        <section class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm grow">
                    <div class="login-left">
                        <img class="img-fluid rounded-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo of {{ config('app.name') }}">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>{{ __('login.title') }}</h1>
                            <p class="account-subtitle">{{ __('login.subtitle') }}</p>
                            @if ($errors->any())
                                <div id="errorBox" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" role="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('handle-login') }}" method="POST" class="login-form">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="{{ __('login.username_placeholder') }}" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="{{ __('login.password_placeholder') }}" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">{{ __('login.submit_button') }}</button>
                                </div>
                            </form>
                            <div class="text-center forgotpass"><a href="{{ route('forgot-password') }}">{{ __('login.forgot_password') }}</a></div>
                            <div class="login-or">
                                <span class="or-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>

/* CSS */
<style>
    .rounded-logo {
        border-radius: 15%;
    }
</style>
