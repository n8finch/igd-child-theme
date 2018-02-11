<?php


function igd_tour_subpage_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	tour_subpage_hero( $acf_fields, $is_mobile );
	tour_subpage_main_content( $acf_fields, $is_mobile );
	tour_subpage_venue_location( $acf_fields, $is_mobile );
	tour_subpage_bottom_content( $acf_fields, $is_mobile );
}

function tour_subpage_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	?>
	<section id="tour-subpage-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
		<p class="tour-stop-location">New York, NY</p>
		<p class="tour-stop-date">April 18, 2018</p>
	</section>

	<section id="tour-subpage-intro" class="slanted-section">
		<div class="slanted-content">
				<p>Here is some intro copy about the AIR Campaign. Here is some intro copy about the AIR Campaign. Here is some intro copy about the AIR Campaign.</p>
		</div>
	</section>

	<?php
}

function tour_subpage_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="tour-subpage-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>

	<?php
}

function tour_subpage_venue_location( $acf_fields, $is_mobile ) {

	$link = $acf_fields['venue_link'];
	$address = $acf_fields['venue_address'];
	$iframe = $acf_fields['venue_map_iframe_embed'];
	$section_bg = get_stylesheet_directory_uri() . '/assets/images/tour-venue-bg.svg';

	?>
	<section id="tour-subpage-venu-location" style="background-image: url('<?php echo $section_bg; ?>'); background-repeat: no-repeat; background-size: cover;">
		<h2>Venue</h2>
		<div class="tour-subpage-venu-info">
			<div class="tour-subpage-venu-address">
				<h4><?php echo esc_html( $address['venue_name'] ); ?></h4>
				<address>
					 <?php echo esc_html( $address['address_line_1'] ); ?><br />
					<?php echo esc_html( $address['address_line_2'] ); ?>
				</address>
			</div>
			<div class="">
				<a class="button venue-button" href="<?php echo esc_url( $link ); ?>" target="_blank">Venue website</a>
			</div>
		</div>

	</section>
	<?php echo $iframe ; ?>

	<?php
}

function tour_subpage_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_tour_subpage_content();
