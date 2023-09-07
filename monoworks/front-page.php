<?php get_header(); ?>
<main class="mwtrpg">
	<section id="top" class="mwtrpg__top">
		<div class="mwtrpg__top__mv">
			<picture>
				<source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/main_kv_pc.webp">
				<source media="(min-width: 769px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/main_kv_pc.webp">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/main_kv_pc.webp" width="100%" alt="">
			</picture>
			<div class="mwtrpg__top__mv__ttl">
				<h1 class="mwtrpg-font_imp">
					<span class="reveal-text">GOMAMESI</span><br>
					<span class="reveal-text">TRPG</span><br>
					<span class="reveal-text">STUDIO</span>
				</h1>
			</div>
		</div>
	</section>
	<section id="chara" class="mwtrpg__chara">
		<div class="mwtrpg__chara__container">
			<h2 class="section-ttl mwtrpg-font_imp mwGlitchText">CHARACTER</h2>
			<div class="mwtrpg__chara__container__wrapper">
				<ul class="mwtrpg__chara__container__wrapper__filters fade_up_trigger">
					<li>
						<button class="js-item-term" data-term="woman">woman</button>
					</li>
					<li>
						<button class="js-item-term" data-term="man">man</button>
					</li>
					<li>
						<button class="js-item-term" data-term="villain">villain</button>
					</li>
					<li>
						<button class="js-item-term" data-term="justice">justice</button>
					</li>
					<li>
						<button class="js-item-term" data-term="normal">normal</button>
					</li>
				</ul>
				<!-- 1.タブで管理
					2.タブを押したら下部リスト内のデータとタブのデータを比較し、適していたら表示
					3.順番を入れ替え(表示を上部へ非表示を下部へ)
					4.8つから下は非表示
					5.8つ以上のデータ群はmoreボタンを追加し別ページへ飛ばす -->
				<ul class="mwtrpg__chara__container__wrapper__list targets fade_up_trigger">
					<?php $args = array(
						'numberposts' => 16,      //表示（取得）する記事の数
						'post_type' => 'character'    //投稿タイプの指定
					);
					$posts = get_posts($args);

					if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>
							<?php $pc_profile = get_field('pc_profile'); ?>
							<?php $pc_tag = $post->post_name; ?>
							<li class="js-modal-open chara-box js-item" data-tag="
								<?php if ($terms = get_the_terms($post->ID, 'character-cat')) {
									foreach ($terms as $term) {
										$chra_cat = $term->slug . ",";
										echo "{$chra_cat}";
									}
								} ?>" data-modal="<?php echo $pc_tag; ?>">
								<img src="<?php the_post_thumbnail_url("medium"); ?>">
							</li>
						<?php endforeach; ?>
					<?php else : //記事が無い場合 
					?>
						<p>記事はまだありません。</p>
					<?php endif;
					wp_reset_postdata(); //クエリのリセット 
					?>
				</ul>
				<?php $args = array(
					'numberposts' => 12,      //表示（取得）する記事の数
					'post_type' => 'character'    //投稿タイプの指定
				);
				$posts = get_posts($args);

				if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>
						<?php $pc_profile = get_field('pc_profile'); ?>
						<?php $pc_tag = $post->post_name; ?>
						<div id="<?php echo $pc_tag; ?>" class="mwtrpg__chara__container__modal js-modal">
							<div class="mwtrpg__chara__container__modal--bg js-modal-close"></div>
							<div class="mwtrpg__chara__container__modal--content fadeIn">
								<div class="mwtrpg__chara__container__modal--content--text">
									<h3>「<?php echo $pc_profile['pc_voice_01']; ?><?php if (get_field('pc_profile')['pc_voice_02']) : ?><?php echo $pc_profile['pc_voice_02']; ?><?php endif; ?>」</h3>
									<div class="mwtrpg__chara__container__modal--content--deco">
										<div class="DateBlock__1col">
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Name</span>
												<h4><?php echo $pc_profile['pc_name']; ?></h4>
											</div>
										</div>
										<div class="DateBlock__1col">
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Illustrator</span>
												<a href="<?php echo $pc_profile['pc_illustrator-link']; ?>" target="_blank"><?php echo $pc_profile['pc_illustrator']; ?></a>
											</div>
										</div>
										<div class="DateBlock__overcol">
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Age</span>
												<p><?php echo $pc_profile['pc_age']; ?></p>
											</div>
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Height</span>
												<p><?php echo $pc_profile['pc_height']; ?></p>
											</div>
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Job</span>
												<p><?php echo $pc_profile['pc_job']; ?></p>
											</div>
										</div>
										<div class="DateBlock__1col">
											<div class="mwtrpg__chara__container__modal--content--date">
												<span>Note</span>
												<p><?php echo mb_strimwidth($pc_profile['pc_note'], 0, 200, '…'); ?></p>
											</div>
										</div>
									</div>
									<div>
										<a class="link_more" href="<?php the_permalink(); ?>" target="_top">more</a>
									</div>
								</div>
								<div class="mwtrpg__chara__container__modal--content--img chara_slide">
									<div class="swiper-wrapper">
										<img class="swiper-slide" src="<?php the_field('pc_image_01'); ?>">
										<?php if (get_field('pc_image_02')) : ?>
											<img class="swiper-slide" src="<?php the_field('pc_image_02'); ?>">
										<?php endif; ?>
									</div>
								</div>
								<!-- <span class="js-modal-close" href="">閉じる</span> -->
							</div>
							<!--modal__inner-->
						</div>
					<?php endforeach; ?>
				<?php else : //記事が無い場合 
				?>
					<p>記事はまだありません。</p>
				<?php endif;
				wp_reset_postdata(); //クエリのリセット 
				?>
			</div>
		</div>
	</section>

	<section id="movie" class="mwtrpg__movie">
		<div class="mwtrpg__movie__container">
			<h2 class="section-ttl mwtrpg-font_imp mwGlitchText">MOVIE</h2>
			<div class="mwtrpg__movie__container__warpper movie_a fade_up_trigger">
				<div class="swiper-wrapper">
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=Bic8Db7WiSQ">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/aegis_TeamsD.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=vqNtbHTul_E">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/kengou.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=UZw-5p24mvY">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hallows.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=zs-wXELT7CQ">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/zosuku.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=Ds2G9LERNyI">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bash.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=SzrOCUnZL_E">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/nobady.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
				</div>
			</div>
			<div class="mwtrpg__movie__container__warpper movie_b fade_up_trigger">
				<div class="swiper-wrapper">
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=SzrOCUnZL_E">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/nobady.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=Ds2G9LERNyI">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bash.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=zs-wXELT7CQ">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/zosuku.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=UZw-5p24mvY">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hallows.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=vqNtbHTul_E">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/kengou.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
					<div class="js-modal-video-open swiper-slide" data-url="https://www.youtube.com/watch?v=Bic8Db7WiSQ">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/aegis_TeamsD.webp" />
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt_icon_rgb.webp"></span>
					</div>
				</div>
			</div>
			<div id="modal-video" class="close js-modal-video-close">
				<div id="player"></div>
			</div>

		</div>
	</section>

	<section id="log" class="mwtrpg__log">
		<div class="mwtrpg__log__container">
			<h2 class="section-ttl mwtrpg-font_imp mwGlitchText">SESSION LOG</h2>
			<div class="log_slider fade_up_trigger">
				<ul class="mwtrpg__log__container__warpper swiper-wrapper">

					<?php $args = array(
						'numberposts' => 10,      //表示（取得）する記事の数
						'post_type' => 'session'    //投稿タイプの指定
					);
					$posts = get_posts($args);

					if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>

							<li class="mwtrpg__log__container__warpper__box swiper-slide">
								<div class="mwtrpg__log__container__warpper__box__img">
									<?php $session_image = SCF::get('session_img'); ?>
									<?php if (empty($session_image)) { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage_session.png">
									<?php } else { ?>
										<img src="<?php echo wp_get_attachment_url($session_image); ?>">
									<?php } ?>
								</div>
								<div class="mwtrpg__log__container__warpper__box__text">
									<h3><?php the_title(); ?></h3>
									<ul>
										<li>KP:<?php echo SCF::get('session_kp'); ?></li>
										<li>PL:<?php echo SCF::get('session_pl'); ?></li>
									</ul>
								</div>
								<div class="mwtrpg__log__container__warpper__box__info">
									<p><?php echo SCF::get('session_day'); ?></p><a href="<?php the_permalink(); ?>" target="_top">more →</a>
								</div>
							</li>

						<?php endforeach; ?>
					<?php else : //記事が無い場合 
					?>
						<p>記事はまだありません。</p>
					<?php endif;
					wp_reset_postdata(); //クエリのリセット 
					?>
				</ul>
				<div class="swiper-scrollbar"></div>
			</div>
		</div>
	</section>
	<section id="profile" class="mwtrpg__profile">
		<div class="mwtrpg__profile__container">
			<h2 class="section-ttl mwtrpg-font_imp mwGlitchText">PROFILE</h2>
			<div class="mwtrpg__profile__container__warpper">
				<div class="mwtrpg__profile__container__warpper--img fade_up_trigger">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/profile.png">
				</div>
				<div class="mwtrpg__profile__container__warpper--text fade_up_trigger">
					<h3>ごま飯</h3>
					<span>所持ルルブ：CoC6th Dx3rd ネクロニカ シノビガミ</span>
					<p>主にCoCとDx3rdをメインに活動しています。自陣やKP卓の動画をたまに作ったりしています。最近シナリオのLP制作にはまっています。</p>
					<div class="sns_wrapper">
						<a class="sns_wrapper--btn twitter" href="https://twitter.com/gomamesi_TRPG" target="_blank"><span class="fab fa-twitter fa-fw"></span><span>Twitter</span></a>
						<a class="sns_wrapper--btn youtube" href="https://www.youtube.com/channel/UCk5Baeqp-PMA0S644W7W0VQ" target="_blank"><span class="fab fa-youtube fa-fw"></span><span>Youtube</span></a>
						<a class="sns_wrapper--btn calendar" href="https://freecalend.com/close/mem95406/index" target="_blank"><span class="fa-regular fa-calendar-check fa-fw"></span><span>フリカレ</span></a>
					</div>
					<div class="job-address">
						<p>個人サイト/LP/動画制作のご依頼はこちらからご連絡ください。</p>
						<a href="mailto:monoworks1127@gmail.com">monoworks1127@gmail.com</a>
					</div>

				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/script/youtube.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/script/lib/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/script/script.js"></script>

<script>
</script>

</body>

</html>