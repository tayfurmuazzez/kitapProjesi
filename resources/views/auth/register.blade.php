@extends('layouts.app')

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="active">Kayıt OL</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="register">
        <div class="container">
            <div class="register-top heading">
                <h2>KAYIT OL</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input id="name" type="text" tabindex="1" placeholder="Adınız" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="email" type="text" tabindex="1" placeholder="E-Mail" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password" type="password" tabindex="4" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password-confirm" placeholder="Retype password" tabindex="4" type="password" name="password_confirmation" required autocomplete="new-password">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
            </form>
        </div>
    </div>

@endsection
