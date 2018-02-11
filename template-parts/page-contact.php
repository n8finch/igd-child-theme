<?php


function igd_contact_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	contact_hero( $acf_fields, $is_mobile );
	contact_main_content( $acf_fields, $is_mobile );
	contact_bottom_content( $acf_fields, $is_mobile );
}

function contact_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );

	?>
	<section id="contact-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
	</section>

	<?php
}

function contact_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="contact-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
		<?php gravity_form( 1, false, false, false, '', true ); ?>
	</section>

	<?php
}

function contact_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_contact_content();
