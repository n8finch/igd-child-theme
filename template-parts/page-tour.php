<?php


function igd_tour_content() {

	$is_mobile = wp_is_mobile();
	$acf_fields = get_fields();

	//* Add in the sections
	tour_hero( $acf_fields, $is_mobile );
	tour_map_section( $acf_fields, $is_mobile );
	tour_main_content( $acf_fields, $is_mobile );
	tour_bottom_content( $acf_fields, $is_mobile );
}

function tour_hero( $acf_fields, $is_mobile ) {
	$hero_img = get_the_post_thumbnail_url( $post_id, 'full' );
	?>
	<section id="tour-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
		<h1><?php the_title(); ?></h1>
	</section>

	<section id="tour-intro" class="slanted-section">
		<div class="slanted-content">
				<p>The U.S. roadshow will offer a platform to draw attention to the investment opportunities in Africa, African Development Bank’s “High 5s”, and to drive U.S. business and investor interest in the Africa Investment Forum (AIF).</p>
		</div>
	</section>

	<?php
}

function tour_map_section( $acf_fields, $is_mobile ) {
	?>
	<section id="tour-map-section">
		<div class="tour-stops">
			<?php
			$array = array( 0,1,2,3 );
			$img = array( 'policy', 'finance', 'agribusiness', 'energy' );
			$topic = array( 'U.S. Government Financing
Private Sector Engagement Forum', 'Finance, Trade, & Banking industries', 'Agribusiness', 'Energy & Infrastructure' );
			$location = array( 'Washington, D.C.', 'New York, NY', 'Des Moines, IA', 'Houston, TX' );
			$dates = array( 'April 18-19, 2018', 'April 23-24, 2018', 'April 25-26, 2018', 'April 27-28, 2018' );


			foreach( $array as $i ) {
				?>
				<div class="tour-stop">
					<a href="/tour/<?php echo $topic[$i]; ?>">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() . "/assets/images/sm-round-{$img[$i]}.jpg" ); ?>" alt="tour-map"></a>
					<h4><?php echo $topic[$i]; ?></h4>
					<p class="tour-stop-location"><?php echo $location[$i]; ?></p>
					<p class="tour-stop-date"><?php echo $dates[$i]; ?></p>
				</div>
				<?php
			}
			?>
		</div>
		<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/map.png' ); ?>" alt="tour-map">
	</section>

	<?php
}

function tour_main_content( $acf_fields, $is_mobile ) {
	global $post;
	$post_content = $post->post_content;

	?>
	<section id="tour-main-content">
		<?php echo wp_kses_post( $post_content ); ?>
	</section>

	<?php
}

function tour_bottom_content( $acf_fields, $is_mobile ) {
	get_template_part('template-parts/igd-presented-by');
}


igd_tour_content();
