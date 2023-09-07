<?php get_header(); ?>
<main class="mwSession">
	<section class="contents_head">
		<div class="contents_head-ttl">
			<h1 class="mwtrpg-font_imp">SESSION</h1>
			<span>セッション</span>
		</div>
	</section>
	<section class="mwSession__top">
		<div class="mwSession__top__wrapper">
			<div class="mwSession__top__wrapper--img">
				<?php $session_image = SCF::get('session_img'); ?>
				<?php if (empty($session_image)) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage_session.png">
				<?php } else { ?>
					<img src="<?php echo wp_get_attachment_url($session_image); ?>">
				<?php } ?>
			</div>
			<div class="mwSession__top__wrapper--text">
				<h1><?php the_title(); ?></h1>
				<ul>
					<li>KP:<?php echo SCF::get('session_kp'); ?></li>
					<li>PL:<?php echo SCF::get('session_pl'); ?></li>
				</ul>
				<span><?php echo SCF::get('session_day'); ?></span>
			</div>
		</div>
	</section>
	<section class="mwSession__list">
		<div class="mwSession__list__wrapper">
			<h2 class="section-ttl mwtrpg-font_imp">CHARACTER</h2>
			<ul class="mwSession__list__wrapper__container">
				<?php
				$session_list = SCF::get('session_list');
				foreach ($session_list as $fields) {
					$images = wp_get_attachment_image_src($fields['session_pc-image'], 'full');
				?>
					<li class="mwSession__list__wrapper__container__item">
						<div class="item-deco">
							<?php if (empty($images[0])) { ?>
								<img class="mwSession__list__wrapper__container__item--thum" src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.png">
							<?php } else { ?>
								<img class="mwSession__list__wrapper__container__item--thum" src="<?php echo $images[0]; ?>">
							<?php } ?>
							<div class="mwSession__list__wrapper__container__item--name">
								<h4 class="mwtrpg-font_yumin"><?php echo $fields['session_pc-name']; ?></h4>
								<span class="yomi"><?php echo $fields['session_pc-yomi']; ?></span>
								<span class="player">PL：<?php echo $fields['session_pl-name']; ?></span>
							</div>
							<div class="mwSession__list__wrapper__container__item--text">
								<p><?php echo $fields['session_pc-note']; ?></p>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</section>
	<?php if (!empty($post->post_content)) { ?>
		<section class="mwSession__log">
			<div class="mwSession__log__wrapper">
				<h2 class="section-ttl mwtrpg-font_imp">LOG</h2>
				<div>
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php } ?>
</main>
<?php get_footer(); ?>