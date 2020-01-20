@extends('layouts.app')

@section('content')

    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="active">Giriş Yap</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--account-starts-->
    <div class="account">
        <div class="container">
            <div class="account-top heading">
                <h2>ACCOUNT</h2>
            </div>
            <div class="account-main">
                <div class="col-md-6 account-left">
                    <h3>GİRİŞ YAP</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="account-bottom">
                        <input  placeholder="Email" id="email" type="text" tabindex="3" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="password" placeholder="Password" type="password" tabindex="4" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="address">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <br>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-6 account-right account-left">
                    <h3>Yeni Kullanıcı mısınız? Kayıt ol</h3>
                    <p>Ücretsiz Kayıt OLun </p>
                    <a href="{{route('register')}}">Hesap Oluşturun</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--account-end-->


@endsection
