<?php


function igd_about_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	about_hero( $acf_fields, $is_mobile );
	about_main_content( $acf_fields, $is_mobile );
	about_bottom_content( $acf_fields, $is_mobile );
}

function about_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	?>
	<section id="about-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
	</section>

	<section id="about-intro" class="slanted-section">
		<div class="slanted-content">
				<p>A multimedia campaign to re-shape the narrative on doing business in Africa by showcasing the continent's tremendous business and investment potential.</p>
		</div>
	</section>

	<?php
}

function about_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="about-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>

	<?php
	get_template_part('template-parts/media-feed-section');

}

function about_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_about_content();
