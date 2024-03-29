=== Rss With Image Feed Shortcode  ===
Contributors: mgn Co.,Ltd.
Tags: rss, shortcode, image, eyecatch
Requires at least: 6.4 or higher
Tested up to: 6.4.0
Stable tag: 0.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This plugin can add and display eyecatch images from rss feed including images.
The shortcode is `[rss-with-image]` and can be set with the following parameters.

アイキャッチ画像を含む RSS フィードからデータを取得して出力するショートコードを提供します。
ショートコードは `[rss-with-image]` で、以下のパラメータで設定が可能です。

= Parameters =

'url'      : RSS feed URL to retrieve (enter URL)
'count'    : Number of articles to retrieve. (enter an integer)
'img'      : Image if image could not be retrieved. (Enter URL)
'arealink' : Whether the link should be to the whole card or only post title. (true to enable)
'target'   : Whether to open the link in a new tab. (true to enable)
'author'   : Whether to display the post author's name or not. (true to enable)
'excerpt'  : Whether to display excerpts. (true to enable)
'align'    : Add `align***` class to the outer frame `rwifs-rss-feed` of the block.

= パラメータ =

'url'      : 取得する RSS フィード URL. (URL を入力)
'count'    : 取得する記事の数. (整数を入力)
'img'      : 画像が取得できなかった場合の画像. (URL を入力)
'arealink' : リンクをカード全体かタイトル部分だけにするかどうか. (true で有効)
'target'   : リンクを別タブで開くかどうか. (true で有効)
'author'   : 投稿者名を表示するかどうか. (true で有効)
'excerpt'  : 抜粋を表示するかどうか. (true で有効)
'align'    : ブロックの外枠 `rwifs-rss-feed` に `align***` クラスを付与

= default =

'url'      : https://ja.wordpress.org/feed/
'count'    : 3
'img'      : /images/no-image.png
'arealink' : false
'target'   : false
'author'   : false
'excerpt'  : false
'align'    : null


== Installation ==

1. Upload the `rss-with-image-feed-shortcode` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.0.5 =
* Add param for links to open other tabs

= 0.0.4 =
* Add param for class `align***`

= 0.0.3 =
* Add .editorconfig file
* Add readme.txt file

= 0.0.2 =
* Replace no-image image file
* Inclease shortcode params
* Separate files

= 0.0.1 =
* Initial release
