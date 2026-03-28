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
                            <p>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</p>
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">性別</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['gender_name'] }}</p>
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">メールアドレス</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['email'] }}</p>
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">電話番号</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['tel'] }}</p>
                            <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">住所</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['address'] }}</p>
                            <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">建物名</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['building'] }}</p>
                            <input type="hidden" name="building" value="{{ $contact['building'] }}">
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
                            <p>{{ $contact['category_name'] }}</p>
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="confirm--table">
                <table class="confirm--table__innner">
                    <tr class="confirm--table__row">
                        <th class="confirm--table__header">お問い合わせ内容</th>
                        <td class="confirm--table__item">
                            <p>{{ $contact['detail'] }}</p>
                            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
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

    </main>

    </html>

@endsection
