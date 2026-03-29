<div>
    <button type="button" class="admin__content--modal__link" wire:click="showDetail()">
        詳細
    </button>

    @if($showModal && $selectedContact)
        <div class="modal__overlay" wire:click="closeModal()">
            <div class="modal__content" @click.stop>
                <button class="modal__close" wire:click="closeModal()">×</button>
                <h2 class="modal__title">お問い合わせ詳細</h2>

                <div class="modal__body">
                    <div class="modal__item">
                        <span class="modal__label">お名前</span>
                        <p class="modal__value">{{ $selectedContact->last_name }} {{ $selectedContact->first_name }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">性別</span>
                        <p class="modal__value">
                            @if($selectedContact->gender == 1)
                                男性
                            @elseif($selectedContact->gender == 2)
                                女性
                            @else
                                その他
                            @endif
                        </p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">メールアドレス</span>
                        <p class="modal__value">{{ $selectedContact->email }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">電話番号</span>
                        <p class="modal__value">{{ $selectedContact->tel }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">住所</span>
                        <p class="modal__value">{{ $selectedContact->address }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">建物名</span>
                        <p class="modal__value">{{ $selectedContact->building ?? '記載なし' }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">お問い合わせの種類</span>
                        <p class="modal__value">{{ $selectedContact->category->name }}</p>
                    </div>

                    <div class="modal__item">
                        <span class="modal__label">お問い合わせ内容</span>
                        <p class="modal__value">{{ $selectedContact->detail }}</p>
                    </div>
                </div>

                <div class="modal__footer">
                    <button wire:click="deleteContact()" class="modal__delete" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                </div>
            </div>
        </div>
    @endif

    <style>
        .modal__overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
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
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .modal__item:last-child {
            border-bottom: none;
        }

        .modal__label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .modal__value {
            margin: 0;
            padding: 8px 12px;
            background-color: #f9f9f9;
            border-radius: 4px;
            color: #555;
            min-height: 30px;
            display: flex;
            align-items: center;
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
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .modal__delete:hover {
            background-color: #c82333;
        }

        .admin__content--modal__link {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .admin__content--modal__link:hover {
            background-color: #0056b3;
        }
    </style>
</div>
