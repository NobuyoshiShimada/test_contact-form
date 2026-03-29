@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
    <div class="header__button">
        <a href="/logout" class="header__button--logout">logout</a>
    </div>
@endsection

@section('content')
    <div class="admin">
        <h2 class="admin__title">Admin</h2>
        <div class="admin__content">
            <form action="/admin" method="get" class="admin__form" >
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" class="admin__form--input" value="{{ request('keyword') }}">
                <select name="gender" class="admin__form--gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id" class="admin__form--category">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="date" name="search_date" value="{{ request('search_date') }}">
                <button type="submit" class="admin__form--button">検索</button>
                <button type="button" class="admin__form--button" onclick="location.href='/admin'">リセット</button>
            </form>
            <div class="admin__form--export">
                <button name="export" value="1" class="admin__form--button">エクスポート</button>
            </div>
            <div class="admin__content--result">
                <p class="admin__content--result__count">全件数: {{ $contacts->count() }}</p>
                <table class="admin__content--result__table">
                    <thead>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                <td>
                                    @if ($contact->gender == 1)
                                        男性
                                    @elseif ($contact->gender == 2)
                                        女性
                                    @else
                                        その他
                                    @endif
                                </td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->category->name }}</td>
                                <td><button href="search-modal" class="admin__content--modal__link">詳細</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
