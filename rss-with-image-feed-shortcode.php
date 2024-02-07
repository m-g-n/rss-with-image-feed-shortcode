<?php
/**
 * Plugin name: Rss With Image Feed Shortcode
 * Description: アイキャッチ画像を含む RSS フィードからデータを取得して出力するショートコード
 * Version: 0.0.1
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
 * 取得するフィードの最大の件数
 *
 * @var string
 */
define( 'RWIFS_MAX_NUM', 6 );

if ( ! function_exists( 'get_rss_feed_tag' ) ) :
	/**
	 * RSS フィードを取得して出力
	 *
	 * @param array $atts ショートコードのパラメータ.
	 */
	function get_rss_feed_tag( $atts ) {

		// ショートコードのパラメータのデフォルト値を設定.
		$atts = shortcode_atts(
			array(
				'url'   => 'https://ja.wordpress.org/feed/',       // 取得する RSS フィード URL.
				'count' => '6',                                    // 取得する記事の数.
				'img'   => RWIFS_URL . '/images/no-image-rss.png', // 画像が取得できなかった場合の画像.
			),
			$atts,
			'rss-with-image'
		);

		/**
		 * 変数の宣言
		 */
		// フィードのための各種変数を宣言.
		$feed_url          = $atts['url'];
		$feed_count        = $atts['count'];
		$default_image_url = $atts['img'];

		// RSS の取得.
		$rss = simplexml_load_file( $feed_url, 'SimpleXMLElement' );

		ob_start();
		?>
<ul class="rwifs-rss-feed">
		<?php
		// 変数の宣言.
		$i = 0;

		foreach ( $rss->channel->item as $item ) :
			// ループが表示の上限を超えたら終了.
			if ( $i >= RWIFS_MAX_NUM ) {
				break;
			}

			// 記事タイトル.
			$feed_item_title = $item->title;
			// リンク先 URL.
			$feed_item_link = $item->link;
			// 投稿日時.
			$feed_item_date = gmdate( get_option( 'date_format' ), strtotime( $item->pubDate ) ); // phpcs:ignore
			// 投稿者名.
			$feed_item_writer = $item->children( 'dc', true )->creator;

			/**
			 * 記事の抜粋
			 */
			$feed_item_text = $item->description;
			// 抜粋に含まれるショートコードを削除.
			$feed_item_text = preg_replace( '/\[.+?\]/i', '', $feed_item_text );
			// 抜粋に含まれる画像を削除.
			$feed_item_text = preg_replace( '/<img(.+?)>/', '', $feed_item_text );

			// コンテンツを属性ごとに取得.
			$attributes = $item->children( 'media', true )->content->attributes();

			// 属性が取得できたら.
			if ( null !== $attributes ) {
				// それぞれの属性値から変数を設定.
				$thumb_url    = $attributes->url;
				$thumb_width  = $attributes->width;
				$thumb_height = $attributes->height;
			} else {
				// 属性値が取得できなかったらデフォルト画像を設定.
				$thumb_url = $default_image_url;

				// デフォルトに設定した画像の属性値を取得.
				$image_info = getimagesize( $thumb_url );

				// デフォルト画像の属性値を取得.
				$thumb_width  = $image_info[0];
				$thumb_height = $image_info[1];
			}
			?>
	<li class="rwifs-rss-feed__item">
		<a href="<?php echo esc_url( $feed_item_link ); ?>" class="rwifs-rss-feed__item__wrapper">
			<figure class="rwifs-rss-feed__item__thumb">
				<img src="<?php echo esc_url( $thumb_url ); ?>" width="<?php echo esc_attr( $thumb_width ); ?>" height="<?php echo esc_attr( $thumb_height ); ?>" alt="" />
			</figure>
			<h3 class="rwifs-rss-feed__item__title"><?php echo esc_html( $feed_item_title ); ?></h3>
			<ul class="rwifs-rss-feed__item__meta">
				<li class="rwifs-rss-feed__item__date"><?php echo esc_html( $feed_item_date ); ?></li>
				<li class="rwifs-rss-feed__item__name"><?php echo esc_html( $feed_item_writer ); ?></li>
			</ul>
			<p class="rwifs-rss-feed__item__excerpt"><?php echo esc_html( $feed_item_text ); ?></p>
		</a>
	</li>
			<?php
			$i++;
		endforeach;
		?>
</ul>
		<?php
		return ob_get_clean();
	}
endif;
add_shortcode( 'rss-with-image', 'get_rss_feed_tag' );
