<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body,
        .container {
            height: 100%;
        }

        #columnaimagen {
            background-repeat: repeat;
            background-size: cover;
            background-image: url('images/fondo.jpg');
        }

        #texto {
            position: fixed;
            bottom: 20%;
            left: 10%;
        }
    </style>
</head>

<body style="height: 100%;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">

            <div class="col-8 h-100" id="columnaimagen">
                <div id="texto">
                    <h2>Plataforma xxx empleados</h2>
                    <h3>gestion de usuarios</h3>
                </div>
            </div>
            <div class="col-3 mt-5">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="https://placeholderlogo.com/img/placeholder-logo-1.png"
                            alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-5">
                                    <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-5">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary  btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your User?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
