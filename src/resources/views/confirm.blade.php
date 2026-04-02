@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm">
        <h2 class="confirm__title">Confirm</h2>
        <form class="confirm__form" action="/contact" method="post">
            @csrf

            <div class="confirm__table">
                <table class="confirm__table--inner">
                    <tbody>
                        <tr class="confirm__row">
                            <th class="confirm__header">お名前</th>
                            <td class="confirm__value">
                                {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">性別</th>
                            <td class="confirm__value">
                                {{ $contact['gender_name'] }}
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">メールアドレス</th>
                            <td class="confirm__value">
                                {{ $contact['email'] }}
                                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">電話番号</th>
                            <td class="confirm__value">
                                {{ $contact['tel'] }}
                                <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">住所</th>
                            <td class="confirm__value">
                                {{ $contact['address'] }}
                                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">建物名</th>
                            <td class="confirm__value">
                                {{ $contact['building'] }}
                                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">お問い合わせの種類</th>
                            <td class="confirm__value">
                                {{ $contact['category_name'] }}
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                            </td>
                        </tr>
                        <tr class="confirm__row">
                            <th class="confirm__header">お問い合わせ内容</th>
                            <td class="confirm__value">
                                {{ $contact['detail'] }}
                                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="confirm__footer">
                <button class="confirm__button--submit" type="submit">送信</button>
                <a href="/" class="confirm__button--edit">修正</a>
            </div>
        </form>
    </div>

@endsection
