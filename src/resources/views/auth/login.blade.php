@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('header-nav')
<nav class="header__nav">
    <a class="header__nav-button" href="/register">register</a>
</nav>
@endsection

@section('content')
<div class="login">
    <h2 class="login__heading">Login</h2>

    <div class="login__form-wrapper">
        <form class="login__form" action="/login" method="POST">
            @csrf

            <div class="login__group">
                <label class="login__label">メールアドレス</label>
                <input class="login__input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
            <div class="login__error">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>

            <div class="login__group">
                <label class="login__label">パスワード</label>
                <input class="login__input" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="login__error">
                @error('password') <span>{{ $message }}</span> @enderror
            </div>

            <div class="login__button-wrapper">
                <button class="login__button" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
