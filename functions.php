<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyfifteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );


    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

	wp_enqueue_script( 'igd-app-js', get_bloginfo( 'stylesheet_directory' ) . '/assets/app.js', array( 'jquery' ), '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



//* Reorder simple social icons
//* https://github.com/copyblogger/simple-social-icons/wiki/Reorder-icons-in-version-2.0
add_filter( 'simple_social_default_profiles', 'igd_custom_reorder_simple_icons' );

function igd_custom_reorder_simple_icons( $icons ) {

	// Set your new order here
	$new_icon_order = array(
		'facebook'    => '',
		'twitter'     => '',
		'linkedin'    => '',
	);

	foreach( $new_icon_order as $icon => $icon_info ) {
		$new_icon_order[ $icon ] = $icons[ $icon ];
	}

	return $new_icon_order;
}


add_action( 'wp_footer', 'seredip_add_typekit_script', 99 );

function seredip_add_typekit_script() {
	?>
	<script>
	(function(d) {
	var config = {
	kitId: 'ulf5dpz',
	scriptTimeout: 3000,
	async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
	</script>
	<?php
}



function igd_leaders_rss_feed() {

		// Get a SimplePie feed object from the specified feed source.
	$rss = fetch_feed( 'http://www.igdleaders.org/feed' );

	$maxitems = 0;


	if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

	    // Figure out how many total items there are, but limit it to 5.
	    $maxitems = $rss->get_item_quantity( 3 );

	    // Build an array of all the items, starting with element 0 (first element).
	    $rss_items = $rss->get_items( 0, $maxitems );
		$counter = 0;

	endif;

	?>

	    <?php if ( $maxitems == 0 ) : ?>
	        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
	    <?php else : ?>
	        <?php // Loop through each feed item and display each item as a hyperlink. ?>
	        <?php foreach ( $rss_items as $item ) : ?>
	        		<?php
					( $counter%2 == 0  ) ? $bg_class = 'white' : $bg_class = 'purple';
	        		if ($enclosure = $item->get_enclosure())

							$title = $item->get_title();
							$link = $item->get_link();
							$author = $item->get_author();
							$author = $author->get_name();
							$date = $item->get_date( 'F j, Y' );
							?>
				<a href="<?php echo $link; ?>" target="_blank">
		            <article class="igd-rss-article <?php echo esc_html( $bg_class ); ?>">
		            		<h4><?php echo $title; ?></h4>
		            		<p>Published by: <?php echo $author . ' on ' . $date; ?></p>
		            </article>
				</a>
				<?php $counter++; ?>
	        <?php endforeach; ?>
	    <?php endif; ?>

	<?php
} //end shortcode



/* Add Google Maps API Key for ACF
function igd_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyC_u2OlYF_ehlnAktu35v7OOdujpOaJL2s';

	return $api;

}

add_filter('acf/fields/google_map/api', 'igd_acf_google_map_api');


/* Add extra sidebar */

add_action( 'widgets_init', 'igd_slug_widgets_init' );
function igd_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sub-Header', 'twentyfifteen' ),
        'id' => 'sub-header',
        'description' => __( 'Widgets in this area will be shown on header.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
}
