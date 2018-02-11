<?php


function igd_sponsors_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	sponsors_hero( $acf_fields, $is_mobile );
	sponsors_main_content( $acf_fields, $is_mobile );
	sponsors_bottom_content( $acf_fields, $is_mobile );
}

function sponsors_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	?>
	<section id="sponsors-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
	</section>

	<section id="sponsors-intro" class="slanted-section">
		<div class="slanted-content">
				<p>Special thanks to our wonderful sponsors. If you’d like to be a Sponsor, please contact Peter Nance, IGD Business Development & Membership Manager at <a href="mailto:pnance@igdleaders.org">pnance@igdleaders.org</a> or call, +1.202.454.3972.</p>
		</div>
	</section>

	<?php
}

function sponsors_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="sponsors-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>

	<?php
}

function sponsors_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_sponsors_content();
