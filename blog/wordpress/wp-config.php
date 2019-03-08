<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wordpress');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LB*%]5~PaXT@S5AxjG3E)Cbe(u&_R!dRR,x@%N!Y?g6k8CMecxXwW&o/T%Pxc%DZ');
define('SECURE_AUTH_KEY',  'sMR@%2_rPO4)<+?0o0yZ~=b[/y4fzYk%DYeOCvYw)vC]h>~;8~wLbW_zC~r o2jR');
define('LOGGED_IN_KEY',    'zB$/>r;Yh/ 8%=vMet!b#Vy|Rdm460!UM ;|s77-xM />8%.^>jtOmUZ^U{?[HlA');
define('NONCE_KEY',        'dYLF_j)CLsW: dnOqLJ_%k_ZKa%Z+iQFh==<ebjT?M*MoMZrz#qSL=q.vTn>;.*3');
define('AUTH_SALT',        'sldZSD#x{bb05m{+d<8v%DZr~U!k(L.ai%+B~ylHH.LOM[JPs+MN(<P!@V%UM Cu');
define('SECURE_AUTH_SALT', 'o@J*JtIuM1{aj>2r_bYQM)[!YCf{*UK4;4M><^@mGoIm3fqkUVfg.o0.}s.vt%G9');
define('LOGGED_IN_SALT',   'TFGBzv;: R$pX-_T)w{D.)`nU$B+_Jd%<sp[:t=6y[5~]tW!f,L4|PGJF,+k9* 4');
define('NONCE_SALT',       ',FdCN,HReEtU(HAmv]Dxy@ >C(#mwW5xm=t8(HB/<PB1YLn[Hz7>G^SPDm$@RNu[');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
