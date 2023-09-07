<?php
// 投稿ページのみアイキャッチ画像を設定する場合
add_theme_support('post-thumbnails', array('character'));


/* ---------- カスタム投稿タイプを追加 ---------- */
function trpg_custom_page()
{
	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail',
		'revisions'
	);
	//①この下の行からコピー
	register_post_type(
		'character',
		array(
			'public' => true,
			'label' => 'キャラクター',
			'show_in_rest' => true,
			'supports' => $supports,
			'has_archive' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-admin-customizer',
			'hierarchical' => true,
			'labels' => array(
				'menu_name' => 'キャラクター',
				'all_items' => 'キャラクター投稿一覧',
				'add_new' => '新規キャラクターページ追加',
				'exclude_from_search' => false,
			),
		)
	);
	register_taxonomy(
		'character-cat',  /* タクソノミーのslug */
		'character',           /* 属する投稿タイプ */
		array(
			'hierarchical' => true,
			'label' => 'カテゴリー',
			'update_count_callback' => '_update_post_term_count',
			'show_in_rest' => true,
		)
	);
	register_taxonomy(
		'character-tag',  /* タクソノミーのslug */
		'character',           /* 属する投稿タイプ */
		array(
			'hierarchical' => false,
			'label' => 'タグ',
			'update_count_callback' => '_update_post_term_count',
			'show_in_rest' => true,
		)
	);
	////////////////////

	register_post_type(
		'session',
		array(
			'public' => true,
			'label' => 'セッション',
			'show_in_rest' => true,
			'supports' => $supports,
			'has_archive' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-admin-customizer',
			'hierarchical' => true,
			'labels' => array(
				'menu_name' => 'セッション',
				'all_items' => 'セッション投稿一覧',
				'add_new' => '新規セッションページ追加',
				'exclude_from_search' => false,
			),
		)
	);
	register_taxonomy(
		'session-cat',  /* タクソノミーのslug */
		'session',           /* 属する投稿タイプ */
		array(
			'hierarchical' => true,
			'label' => 'カテゴリー',
			'update_count_callback' => '_update_post_term_count',
			'show_in_rest' => true,
		)
	);
	register_taxonomy(
		'session-tag',  /* タクソノミーのslug */
		'session',           /* 属する投稿タイプ */
		array(
			'hierarchical' => false,
			'label' => 'タグ',
			'update_count_callback' => '_update_post_term_count',
			'show_in_rest' => true,
		)
	);
	////////////////////
	flush_rewrite_rules(false);
}
add_action('init', 'trpg_custom_page');


add_filter('post_type_link', 'session_custom_post_type_link', 1, 2);
function session_custom_post_type_link($link, $post)
{
	if ('session' === $post->post_type) {
		return home_url('/session/' . $post->ID);
	} else {
		return $link;
	}
}

add_filter('rewrite_rules_array', 'session_custom_post_rewrite_rules_array');
function session_custom_post_rewrite_rules_array($rules)
{
	$new_rules = array(
		'session/([0-9]+)/?$' => 'index.php?post_type=session&p=$matches[1]',
	);
	return $new_rules + $rules;
}
