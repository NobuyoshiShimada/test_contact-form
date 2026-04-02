# アプリケーション名

- 確認テスト　お問い合わせフォーム

## 環境構築

**Dockerビルド**

- git clone git@github.com:NobuyoshiShimada/test_contact-form.git
- docker-compose up -d --build

+**コンテナアクセスの手順**

- docker-compose exec php bash

**storage以下のアクセス権を変更**

- chmod -R 777 storageの実行する為の記載

**Laravel環境構築**

- composer install
- cp .env.example .env  ※環境変数を適宜変更
- php artisan key:generate

- php artisan migrate  ※.envを書き換えないとdb系の作業はできない
- php artisan db:seed

**環境変数を適宜変更**
.envの書き換え箇所の記載  ※これをmigrateやseedの前に書き替えておく

- DB_HOST=mysql
- DB_DATABASE=test_contact-form_db
- DB_USERNAME=test_contact-form_user
- DB_PASSWORD=test_contact-form_pass

## 使用技術

- macOS Swquoia 15.6
- PHP: 8.1.34
- Laravel: 8.83.29
- MySQL 8.0.26
- nginx 1.21.1

## 開発環境

- お問い合わせ画面 : http://localhost/
- ユーザー登録 : http://localhost/register/
- phpMyAdmin : http://localhost:8080

## ER図

![](test_contact-form.png)
