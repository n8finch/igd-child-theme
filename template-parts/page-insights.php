<?php


function igd_insights_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	insights_hero( $acf_fields, $is_mobile );
	insights_main_content( $acf_fields, $is_mobile );
	insights_bottom_content( $acf_fields, $is_mobile );
}

function insights_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );

	?>
	<section id="insights-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
	</section>

	<section id="insights-intro" class="slanted-section">
		<div class="slanted-content">
				<p>Delivering timely commentary, insights and strategic reports, and in-depth analysis on trade and investment in Africa.</p>
		</div>
	</section>

	<?php
}

function insights_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="insights-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>

	<?php
}

function insights_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_insights_content();
