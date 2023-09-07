<?php
/*
パーツ：フッター
*/
?>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none;">
	<defs>
		<filter id="filternoiseFirst">
			<feTurbulence baseFrequency="0.8" numOctaves="7"></feTurbulence>
			<feDisplacementMap in="SourceGraphic" scale="-10"></feDisplacementMap>
		</filter>

		<filter id="filternoiseSecond">
			<feTurbulence baseFrequency="0.2" numOctaves="15"></feTurbulence>
			<feDisplacementMap in="SourceGraphic" scale="12"></feDisplacementMap>
		</filter>

		<filter id="noise">
			<feTurbulence baseFrequency="0.5" numOctaves="10"></feTurbulence>
			<feDisplacementMap in="SourceGraphic" scale="8"></feDisplacementMap>
		</filter>
	</defs>
</svg>

<footer class="mwtrpg_footer">

	<?php if (is_home() || is_front_page()) { ?>
		<ul class="mwtrpg_footer--list">
			<li><a href="#top">TOP</a></li>
			<li><a href="#chara">CHARACTER</a></li>
			<li><a href="#movie">MOVIE</a></li>
			<li><a href="#log">SESSION LOG</a></li>
			<li><a href="#profile">PROFILE</a></li>
		</ul>
	<?php } else { ?>
		<ul class="mwtrpg_footer--list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>#top">TOP</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#chara">CHARACTER</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#movie">MOVIE</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#log">SESSION LOG</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#profile">PROFILE</a></li>
		</ul>
	<?php } ?>


	<h3 class="mwtrpg_footer--logo">Monoworks</h3>
	<p class="mwtrpg_footer--copyr">Copyright© Monoworks , 2023 All Rights Reserved.</p>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/script/lib/jquery-3.7.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/script/youtube.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/script/lib/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/script/script.js"></script>



</body>

</html>