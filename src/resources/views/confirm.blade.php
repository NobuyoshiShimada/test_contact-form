@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm">
        <h2 class="confirm_title">Confirm</h2>
        <form class="confirm_form" action="/contact" method="post">
            @csrf

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">お名前</th>
                        <td class="confirm--table__item">
                            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">性別</th>
                        <td class="confirm--table__item">
                            <input type="text" name="gender" value="{{ $contact['gender_name'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">メールアドレス</th>
                        <td class="confirm--table__item">
                            <input type="text" name="email" value="{{ $contact['email'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">電話番号</th>
                        <td class="confirm--table__item">
                            <input type="text" name="tel" value="{{ $contact['tel'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">住所</th>
                        <td class="confirm--table__item">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">建物名</th>
                        <td class="confirm--table__item">
                            <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>
            <!--お問い合わせの種類-->
            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">お問い合わせの種類</th>
                        <td class="confirm--table__item">
                            <input type="text" name="category_name" value="{{ $contact['category_name'] }}" readonly>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">お問い合わせ内容</th>
                        <td class="confirm--table__item">
                            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                        </td>
                    </tr>
                </table>
             </div>
             <div class="form__button">
                <button class="form__button--sending" type="submit">送信</button>
                <a href="/" class="confirm_form_link">修正</a>
                </div>
        </form>
    </div>

@endsection
