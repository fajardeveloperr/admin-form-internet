{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <head>

        <meta charset="utf-8">
        <title>Nusanet</title>
        <!-- Site favicon -->
        <link rel="icon" type="image" sizes="16x16" href="{{ asset('vendors/images/nusanett.png')}}">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css')}}">

    </head>
     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="/"><img class="navbar-brand fixed" src="#" alt="" width="%"></a>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->
    <body class="login-page">
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-7">
                        <img src="{{ asset('vendors/images/login-page-img.png')}}" alt="">
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title d-flex justify-content-center">
                                <span><h2 class="text-center text-muted "><a href="/"><img src="{{ asset('vendors/images/nusanett.png')}}" style="margin-left:25%;"width="50%"  alt=""></a></h2></span>
                            </div>
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group custom">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" :value="old('email')" required autofocus placeholder="Email Pengguna">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" id="password"  name="password" required autocomplete="current-password" placeholder="****">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <div class="row pb-30">
                                    <div class="col-6">
                                            <input type="checkbox" id="remember_me" name="remember">
                                            <label class="ml-2 text-muted" for="customCheck1">Ingat Saya</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="col-6">
                                        <div class="forgot-password"><a href="{{ route('password.request') }}">Lupa Password ?</a></div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0 flex justify-content-between">
                                            <a href="{{ route('register') }}">Belum punya akun?</a>
                                            <button type="submit" class="btn btn-dark btn-sm rounded text-center">Masuk</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-guest-layout>

