<?php


function igd_view_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	homepage_hero( $acf_fields, $is_mobile );
	homepage_main_content( $acf_fields, $is_mobile );
	homepage_quadrant( $acf_fields, $is_mobile );
	homepage_bottom_content( $acf_fields, $is_mobile );
}

function homepage_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	?>
	<section id="homepage-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1>U.S. Roadshow Tour to Build Momentum for Investing in Africa’s Economic Prosperity</h1>
		<a class="button button-homepage" href="#">Reserve Your Seat!</a>
	</section>

	<?php
	get_template_part('template-parts/igd-presented-by');
}

function homepage_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="homepage-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>
	<?php
}

function homepage_quadrant( $acf_fields, $is_mobile ) {
	$quad_1 = get_stylesheet_directory_uri() . '/assets/images/home-1.jpg';
	$quad_2 = get_stylesheet_directory_uri() . '/assets/images/home-2.jpg';
	$quad_3 = get_stylesheet_directory_uri() . '/assets/images/home-3.jpg';
	$quad_4 = get_stylesheet_directory_uri() . '/assets/images/home-4.jpg';
	?>
	<section id="homepage-quadrant">
		<div class="homepage-quadrant-tiles">

			<div class="homepage-quadrant-tile-container" style="background-image: url('<?php echo esc_url( $quad_1 ); ?>') ;">
				<div class="homepage-quadrant-tile">
					<span class="homepage-quadrant-label">Government</span>
				</div>
				<div class="homepage-quadrant-tile-hover">
					<h3>Government</h3>
					<span class="span-strong">Washington, DC</span>
					<span>April 18-19, 2018</span>
					<a class="button" href="tour/policy/">Learn more</a>
				</div>
			</div>

			<div class="homepage-quadrant-tile-container" style="background-image: url('<?php echo esc_url( $quad_2 ); ?>') ;">
				<div class="homepage-quadrant-tile">
					<span class="homepage-quadrant-label">Finance</span>
				</div>
				<div class="homepage-quadrant-tile-hover">
					<h3>Finance</h3>
					<span class="span-strong">New York, NY</span>
					<span>April 23-24, 2018</span>
					<a class="button" href="tour/finance/">Learn more</a>
				</div>
			</div>

			<div class="homepage-quadrant-tile-container" style="background-image: url('<?php echo esc_url( $quad_3 ); ?>') ;">
				<div class="homepage-quadrant-tile">
					<span class="homepage-quadrant-label">Agribusiness</span>
				</div>
				<div class="homepage-quadrant-tile-hover">
					<h3>Agribusiness</h3>
					<span class="span-strong">Des Moines, IA</span>
					<span>April 25-26, 2018</span>
					<a class="button" href="tour/agribusiness/">Learn more</a>
				</div>
			</div>

			<div class="homepage-quadrant-tile-container" style="background-image: url('<?php echo esc_url( $quad_4 ); ?>') ;">
				<div class="homepage-quadrant-tile">
					<span class="homepage-quadrant-label">Energy</span>
				</div>
				<div class="homepage-quadrant-tile-hover">
					<h3>Energy</h3>
					<span class="span-strong">Houston, TX</span>
					<span>April 27-28, 2018</span>
					<a class="button" href="tour/energy/">Learn more</a>
				</div>
			</div>

		</div>
	</section>
	<?php
}

function homepage_bottom_content( $acf_fields, $is_mobile ) {
	?>
	<section id="homepage-bottom-content">
		<p>Africa Investment Rising is a communications and advocacy effort to showcase Africa's business and investment potential through multimedia storytelling, blogs and strategic media outreach. Learn more at www.igdleaders.org/aircampaign</p>
	</section>
	<?php
}



igd_view_content();
