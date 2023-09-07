<?php
//どのテンプレートからでも呼び出せるようにグローバル変数を定義
global $search_paged;
global $search_args;
$c_post     = 'character'; // カスタム投稿
$tax_type01 = 'character-cat'; // タクソノミー

if (is_singular() || is_front_page()) { //投稿ページや固定ページ、トップページの場合
    $search_paged = get_query_var('page') ? get_query_var('page') : 1;
} else { //その他（アーカイブページなど）
    $search_paged = get_query_var('paged') ? get_query_var('paged') : 1;
}
//キーワード検索欄に入力した単語を取得
$search_word = array();
if (!empty($_GET['f'])) {
    $search_word = $_GET['f'];
    $search_word = str_replace('　', ' ', $search_word); //全角スペースを半角スペースに置き換える（複数単語対応のため）
}
$search_args = array(
    'post_type'      => $c_post, //カスタム投稿
    'paged'          => $search_paged, // ページ番号を設定
    's'              => $search_word, //検索欄に入力した単語
    'post_status'    => 'publish',
    'posts_per_page' => 10, //10件ずつ表示
    'orderby'        => 'name', //名前順
    'order'          => 'DESC',
);
//カスタムタクソノミー【 motion 】部分にあるチェックボックスの内容を取得
$$tax_type01 = array();
if (!empty($_GET[$tax_type01])) {
    foreach ($_GET[$tax_type01] as $value) {
        $$tax_type01[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    $tax_query_args[] = array(
        'taxonomy'         => $tax_type01,
        'terms'            => $$tax_type01,
        'include_children' => false,
        'field'            => 'slug',
        'operator'         => 'IN',
    );
}
//カスタムタクソノミーそれぞれの情報をセットする
if (!empty($_GET[$tax_type01]) || !empty($_GET[$tax_type02]) || !empty($_GET[$tax_type03])) {
    $search_args += array(
        'tax_query' => array(
            'relation' => 'AND',
            array($tax_query_args),
        ),
    );
}
?>
<!-------- 表示させる部分 -------->
<div class="p-filter">
    <div class="p-filter__fixed">
        <form method="get" action="<?php echo esc_url(home_url()); ?>/<?php echo esc_attr($c_post); ?>">
            <!-------- 検索欄の部分 -------->
            <div class="p-filter__block">
                <div class="p-filter__heading"><span class="main">KEYWORD</span><span class="sub">- キーワードで絞り込む -</span></div>
                <label>
                    <input class="p-filter__input" type="search" placeholder="<?php echo esc_attr_x('キーワードを入力', 'placeholder'); ?>" value="<?php echo $search_word ? $search_word : ''; ?>" name="f">
                </label>
            </div>
            <!-------- カテゴリーの部分 -------->
            <div class="p-filter__block">
                <div class="p-filter__heading"><span class="main">CATEGORY</span></div>
                <?php
                $terms = get_terms($tax_type01, array('hide_empty' => false));
                foreach ($terms as $term) :
                    $checked = '';
                    if (in_array($term->slug, $$tax_type01, true)) {
                        $checked = ' checked';
                    }
                ?>
                    <label>
                        <input type="checkbox" name="<?php echo $tax_type01; ?>[]" class="p-filter__check" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                        <span class="p-filter__check-text"><?php echo esc_html($term->name) . '(' . $term->count . ')'; ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <!-------- 絞り込みボタンとクリアボタン -------->
            <div class="p-filter__button">
                <button type="submit" class="p-filter__button-item p-filter__button-item--submit" value="">絞り込み</button>
                <button type="button" class="p-filter__button-item p-filter__button-item--clear" onclick="location.href='<?php echo esc_url(home_url()); ?>/<?php echo esc_attr($c_post); ?>'">クリア</button>
            </div>
        </form>
    </div>
</div>