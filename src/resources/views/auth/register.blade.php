@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('header-nav')
<nav class="header__nav">
    <a class="header__nav-button" href="/login">login</a>
</nav>
@endsection

@section('content')
<div class="register">
    <h2 class="register__heading">Register</h2>

    <div class="register__form-wrapper">
        <form class="register__form" action="/register" method="POST">
            @csrf

            <div class="register__group">
                <label class="register__label">お名前</label>
                <input class="register__input" type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
            </div>
            <div class="register__error">
                @error('name') <span>{{ $message }}</span> @enderror
            </div>

            <div class="register__group">
                <label class="register__label">メールアドレス</label>
                <input class="register__input" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
            <div class="register__error">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>

            <div class="register__group">
                <label class="register__label">パスワード</label>
                <input class="register__input" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="register__error">
                @error('password') <span>{{ $message }}</span> @enderror
            </div>

            <div class="register__button-wrapper">
                <button class="register__button" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
