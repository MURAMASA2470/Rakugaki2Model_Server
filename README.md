# 産学連携2019 チームB バックエンド

## 起動準備

```
// パッケージのインストール
npm install 

// ライブラリのインストール
composer install 

// 再読み込み
composer dump-autoload

// .envファイル作成(初回のみ)
cp .env.example .env

// .envにkeyを生成
php artisan key:generate

// storageを公開
php artisan storage:link

// サーバ起動
php artisan serve
```

## push通知使用方法

 ```
$push = new PushNotification;

//送信者指定の場合（省略可）　宣言しなければ全ユーザーに送信になります。
$push->setUserId('10');

//送信美の指定（省略可）　　　宣言しなければ即座に通知送信
$push->setUserDate('2019-07-10 10:21:00 JST+0900');

//プッシュ通知送信(必須) プッシュ通知のタイトルとメッセージ内容を宣言します
$push->sendPush('title','text');
 ```
