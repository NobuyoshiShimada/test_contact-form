@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <div class="contact">
        <h2 class="contact__title">Contact</h2>
        <form action="/contact/confirm" method="post" class="contact__form">
            @csrf

            <div class="contact__form--item">
                <span for="name" class="contact__form--label">お名前</span>
                <span class="contact__form--required">*</span>
                <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" required >
                <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" required >
                <div class="form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                        <!--バリデーションを実装したら記述-->
                </div>
            </div>
            <!--性別-->
            <div class="contact__form--item">
                <span class="contact__form--label">性別</span>
                <span class="contact__form--required">*</span>
                <input type="radio" name="gender" value="1"{{ old('gender') == '1' ? 'checked' : ''}}>
                <label class="contact__form--label">男性</label>

                <input type="radio" name="gender" value="2"{{ old('gender') == '2' ? 'checked' : ''}}>
                <label class="contact__form--label">女性</label>

                <input type="radio" name="gender" value="3"{{ old('gender') == '3' ? 'checked' : ' '}}>
                <label class="contact__form--label">その他</label>

            </div>
            <!--メールアドレス-->
            <div class="contact__form--item">
                <span class="contact__form--label">メールアドレス</span>
                <span class="contact__form--required">*</span>
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" required>
                <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                        <!--バリデーションを実装したら記述-->
                </div>

            </div>
            <!--電話番号-->
            <div class="contact__form--item">
                <span for="tel" class="contact__form--label">電話番号</span>
                <span class="contact__form--required">*</span>
                <input type="string" name="tel_1" placeholder="080" value="{{ old('tel_1') }}" required >
                <a class="tel_separator">-</a>
                <input type="string" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}" required >
                <a class="tel_separator">-</a>
                <input type="string" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}" required >
                <div class="form__error">
                    @error('tel')
                            {{ $message }}
                        @enderror
                        <!--バリデーションを実装したら記述-->
                </div>
            </div>
            <!--住所-->
            <div class="contact__form--item">
                <span for="address" class="contact__form--label">住所</span>
                <span class="contact__form--required">*</span>
                <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" required>
                <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                        <!--バリデーションを実装したら記述-->
                </div>
            </div>

            <!--建物名-->
            <div class="contact__form--item">
                <span for="building" class="contact__form--label">建物名</span>
                <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>

            <!--お問い合わせの種類-->
            <div class="contact__form--item">
                <span for="category" class="contact__form--label">お問い合わせの種類</span>
                <span class="contact__form--required">*</span>
                <select name="category_id" class="contact__form--select">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!--お問い合わせ内容-->
            <div class="contact__form--item">
                <span for="message" class="contact__form--label">お問い合わせ内容</span>
                <span class="contact__form--required">*</span>
                <textarea name="detail" class="contact__form--textarea" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
                                <div class="form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                        <!--バリデーションを実装したら記述-->
                </div>
            </div>
            <button type="submit" class="contact__form--button">Submit</button>
        </form>
    </div>
@endsection

