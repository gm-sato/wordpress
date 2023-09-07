<?php get_header(); ?>
<?php
$pc_profile = get_field('pc_profile');
$tags = get_the_tags();
?>
<main class="mwCharacter-list">
	<section class="contents_head">
		<div class="contents_head-ttl">
			<h1 class="mwtrpg-font_imp">CHARACTER LIST</h1>
			<span>キャラクターリスト</span>
		</div>
	</section>
	<section class="mwCharacter-list__wrap">
		<div class="mwCharacter-list__wrap-sidebar">
			<aside class="sarch-list">
				<?php get_template_part('filter-searchform'); ?>
			</aside>
		</div>
		<div class="mwCharacter-list__wrap-outer">
			<!------ global変数をWP_Queryにセット ------>
			<?php
			global $search_paged;
			global $search_args;
			$search_query = new WP_Query($search_args);
			if ($search_query->have_posts()) :
			?>
				<div class="mwCharacter-list__wrap-number">
					<!------ 表示件数 ------>
					<span class="post">表示件数：全 <?php echo $search_query->found_posts . ' 件'; ?></span>
					<!------ ページ数 ------>
					<?php if (is_paged()) : ?>
						<span class="page">- <?php show_page_number(''); ?>ページ目</span>
					<?php endif; ?>
				</div>
				<div class="mwCharacter-list__wrap-main">
					<!------ ループ開始 ------>
					<?php
					while ($search_query->have_posts()) :
						$search_query->the_post();
					?>

						<?php $pc_profile = get_field('pc_profile'); ?>
						<div class="mwCharacter-list__wrap-box">
							<img class="mwCharacter-list__wrap-thumb" src="<?php the_post_thumbnail_url("medium"); ?>">
							<h3 class="mwCharacter-list__wrap-name"><?php the_title(); ?></h3>
							<ul class="mwCharacter-list__wrap-cat">
								<?php if ($terms = get_the_terms($post->ID, 'character-cat')) : ?>
									<?php foreach ($terms as $term) : ?>
										<li class="mwCharacter-list__wrap-tag mwCharacter-list__wrap-tag--<?php echo esc_html($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
							<p class="mwCharacter-list__wrap-text"><?php echo mb_strimwidth($pc_profile['pc_note'], 0, 95, '…'); ?></p>
							<a href="<?php the_permalink(); ?>" target="_top" class="mwCharacter-list__wrap-link">more</a>
						</div>

					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<!-- ページネーションを表示 -->
				<?php
				if (function_exists('pagination')) :
					pagination($search_query->max_num_pages, $search_paged);
				endif;
				?>

			<?php else : // 条件分岐：投稿が無い場合は! 
			?>
				<div class="mwCharacter-list__notion">
					<p>投稿が見つかりません。<br>
						記事が存在しないか、すでに削除されている可能性があります。
					</p>
					<a href="<?php echo esc_url(home_url('/character/')); ?>" class="mwCharacter-list__notion-link">絞り込みページに戻る</a>
				</div>
			<?php endif; // 条件分岐終了! 
			?>
		</div>
	</section>
</main>

<?php get_footer(); ?>