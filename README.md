# Rakugaki2Model_Server

## 起動準備

```
// ライブラリのインストール
composer install 

// 再読み込み
composer dump-autoload

// .envファイル作成(初回のみ)
cp .env.example .env

// .envにkeyを生成
php artisan key:generate

// サーバ起動
php artisan serve
```

