@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('button')
    <a href="/login" class="header__button">login</a>
@endsection

@section('content')
    <div class="register">
        <h2 class="register__title">Register</h2>
        <form class="register__form" action="/register" method="post">
            @csrf
            <div class="register__form--item">
                <span class="register__form--label">お名前</span>
                <input type="text" name="name" placeholder="例：山田  太郎" value="{{ old('name') }}" >
                <div class="form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                </div>
            </div>

            <div class="register__form--item">
                <span class="register__form--label">メールアドレス
                </span>
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" >
                <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                </div>
            </div>

            <div class="register__form--item">
                <span class="register__form--label">パスワード
                </span>
                <input type="password" name="password" placeholder="例：coachtech1106" >
                <div class="form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                </div>
            </div>
            
            <div class="register__button">
                <button class="register__button--sending" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
