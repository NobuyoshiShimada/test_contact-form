@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks">
        <h2 class="thanks_title">Thank you</h2>
        <p class="thanks_message">お問い合わせありがとうございました</p>
    </div>
    <form action="/" method="get" class="thanks_form">
        <button type="submit" class="thanks_form_button">HOME</button>
    </form>

