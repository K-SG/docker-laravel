### 予定管理システム「くろのん」

## 使用技術
 PHP
 laravel
 docker
 mysql

## 導入手順
1.GitHubからリポジトリをクローンし、dockerを起動
※各自適当なリポジトリを作成して行ってください(以下ターミナルで動かしてください)
```
git clone git@github.com:SugiKoki/docker-laravel.git
cd docker-laravel
docker-compose up -d --build
```
2.http://127.0.0.1:10080 にアクセス
エラーになることを確認。
※git cloneが終わった状態では app コンテナ内に /work/vendor ディレクトリが存在しないためです。

3.Laravelのインストール
・appコンテナに入り、vendor ディレクトリへライブラリ群をインストールします。
```
docker-compose exec app bash
composer install
```
・composer install 時は .env 環境変数ファイルは作成されないので、 .env.example を元にコピーして作成します
```
cp .env.example .env
```
・アプリケーションキーを生成する
```
php artisan key:generate
```
4.Welcome画面の確認
・http://127.0.0.1:10080
5.DBの作成
マイグレーションでテーブルを作成。シーディングでダミーデータの導入。
ダミーデータの導入を確認し、dockerから出る。
```
php artisan migrate
php artisan db:seed  
```
```
exit
```
7.ログイン画面を表示
http://127.0.0.1:10080/mylogin


## アプリの使い方
1.http://127.0.0.1:10080/mylogin にアクセス
2.新規登録ボタンから指定のルールにしたがってアカウントを作成し、ログイン
3.予定登録を行い、カレンダーから予定の確認を行える

