=== Rss With Image Feed Shortcode  ===
Contributors: mgn Co.,Ltd.
Tags: rss, shortcode, image, eyecatch
Requires at least: 6.4 or higher
Tested up to: 6.4.0
Stable tag: 0.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This plugin can add and display eyecatch images from rss feed including images.

アイキャッチ画像を含む RSS フィードからデータを取得して出力するショートコードを提供します。

= Parameters =

'url'      : RSS feed URL to retrieve (enter URL)
'count'    : Number of articles to retrieve. (enter an integer)
'img'      : Image if image could not be retrieved. (Enter URL)
'arealink' : Whether the link should be to the whole card or only post title. (true to enable)
'author'   : Whether to display the contributor's name or not. (true to enable)
'excerpt'  : Whether to display excerpts. (true to enable)

= パラメータ =

'url'      : 取得する RSS フィード URL. (URL を入力)
'count'    : 取得する記事の数. (整数を入力)
'img'      : 画像が取得できなかった場合の画像. (URL を入力)
'arealink' : リンクをカード全体かタイトル部分だけにするかどうか. (true で有効)
'author'   : 投稿者名を表示するかどうか. (true で有効)
'excerpt'  : 抜粋を表示するかどうか. (true で有効)

= default =

'url'      : https://ja.wordpress.org/feed/
'count'    : 3
'img'      : /images/no-image.png
'arealink' : false
'author'   : false
'excerpt'  : false


== Installation ==

1. Upload the `rss-with-image-feed-shortcode` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.0.3 =
* Add .editorconfig file
* Add readme.txt file

= 0.0.2 =
* Replace no-image image file
* Inclease shortcode params
* Separate files

= 0.0.1 =
* Initial release
