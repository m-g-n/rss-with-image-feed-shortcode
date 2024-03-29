<?php
/**
 * Plugin name: Rss With Image Feed Shortcode
 * Description: アイキャッチ画像を含む RSS フィードからデータを取得して出力するショートコード `[rss-with-image]` を追加します。
 * Author: mgn Co.,Ltd.
 * Version: 0.0.5
 * Author URI: https://www.m-g-n.me/
 *
 * @package rss-with-image-feed-shortcode
 * @author mgn Co.,Ltd.
 * @license GPL-2.0+
 */

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'RWIFS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'RWIFS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * ファイルの読み込み
 */
// ショートコード.
require_once RWIFS_PATH . '/inc/rwifs.php';
