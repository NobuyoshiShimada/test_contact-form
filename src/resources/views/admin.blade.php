@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .modal__overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal__overlay.active {
            display: flex;
        }

        .modal__content {
            position: relative;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal__close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #666;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal__close:hover {
            color: #000;
        }

        .modal__title {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal__body {
            margin-bottom: 30px;
        }

        .modal__item {
            display: flex;
            justify-content: space-between
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .modal__item:last-child {
            border-bottom: none;
        }

        .modal__label {
            font-weight: bold;
            align-items: center

            color: #333;
        }

        .modal__value {
            margin: 0;
            padding: 8px 12px;
            color: #555;
            min-height: 30px;
        }

        .modal__footer {
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .modal__delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 1px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal__delete:hover {
            background-color: #c82333;
        }
    </style>
@endsection

@section('button')
    <form class="header__button">
        <button type="submit" href="/logout" class="header__button--logout">logout</button>
    </form>
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
            <!-- エクスポート機能 -->
            <div class="admin__form--export--pagination">
                <div class="admin__form--export">
                    <button name="export" value="1" class="admin__form--button">エクスポート</button>
                </div>
                <div class="admin__content--result">
                    <div class="admin__pagination">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
                <table class="admin__content--result__table">
                    <thead>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th></th>
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
                                <td class="admin__content--modal__button">
                                    <button type="button" class="admin__content--modal__link" onclick="openModal({{ json_encode($contact) }})">詳細</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- モーダル -->
    <div class="modal__overlay" id="contactModal">
        <div class="modal__content">
            <button class="modal__close" onclick="closeModal()">×</button>
            <div class="modal__body">
                <div class="modal__item">
                    <span class="modal__label">お名前</span>
                    <p class="modal__value" id="modalName"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">性別</span>
                    <p class="modal__value" id="modalGender"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">メールアドレス</span>
                    <p class="modal__value" id="modalEmail"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">電話番号</span>
                    <p class="modal__value" id="modalTel"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">住所</span>
                    <p class="modal__value" id="modalAddress"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">建物名</span>
                    <p class="modal__value" id="modalBuilding"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">お問い合わせの種類</span>
                    <p class="modal__value" id="modalCategory"></p>
                </div>

                <div class="modal__item">
                    <span class="modal__label">お問い合わせ内容</span>
                    <p class="modal__value" id="modalDetail"></p>
                </div>
            </div>

            <div class="modal__footer">
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="modal__delete" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(contact) {
            const genderMap = { 1: '男性', 2: '女性', 3: 'その他' };

            document.getElementById('modalName').textContent = contact.last_name + ' ' + contact.first_name;
            document.getElementById('modalGender').textContent = genderMap[contact.gender] || '';
            document.getElementById('modalEmail').textContent = contact.email;
            document.getElementById('modalTel').textContent = contact.tel;
            document.getElementById('modalAddress').textContent = contact.address;
            document.getElementById('modalBuilding').textContent = contact.building || '記載なし';
            document.getElementById('modalCategory').textContent = contact.category.name;
            document.getElementById('modalDetail').textContent = contact.detail;

            // 削除フォームのアクション設定
            document.getElementById('deleteForm').action = '/admin/' + contact.id;

            document.getElementById('contactModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('contactModal').classList.remove('active');
        }

        // モーダル背景をクリックして閉じる
        document.getElementById('contactModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
