# ounziw_alis
自分のALIS記事をAPI経由で取得して、ホームページやブログに表示する ([concrete5](https://www.concrete5.org/r/-/12635) 用)

ALISで公開されている記事であれば、自分以外の記事でも取得可能。

## 導入方法
このリポジトリをダウンロードし、concrete5 の packages フォルダに置く。
concrete5 管理画面で有効化する

## 設定
User Article ブロックが追加されるので、ALIS記事を表示したい箇所にブロックを置く。
ブロックの設定画面で、ALISのユーザーID、取得する記事数を設定する。

## 見た目の調整
標準では、bootstrap系のスタイルシートを想定して、htmlクラスなどを設定している。
blocks/users_articles/view.php をオーバーライドする、カスタムテンプレートを作成する、などで、見た目の変更が可能。

## キャッシュ
User Article ブロックは、6時間キャッシュします。(キャッシュ設定を変更したい場合は、blocks/users_articles/controller.phpを編集してください)

## 対応バージョン
concrete5.8.4.2以降に対応。(8系なら動く可能性は高いですが、未検証)

## ライセンス
MIT