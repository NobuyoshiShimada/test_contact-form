@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('button')
    <form class="header__button">
        <button type="submit" href="/register" class="header__button--register">register</button>
    </form>
@endsection

@section('content')
    <div class="login">
        <h2 class="login__title">Login</h2>
        <form class="login__form" action="/login" method="post">
            @csrf
            <div class="login__form--item">
                <span class="login__form--label">メールアドレス</span>
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" >
                <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                </div>
            </div>

            <div class="login__form--item">
                <span class="login__form--label">パスワード</span>
                <input type="password" name="password" placeholder="例：coachtech1106" >
                <div class="form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                </div>
            </div>

            <div class="login__button">
                <button class="login__button--sending" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection

