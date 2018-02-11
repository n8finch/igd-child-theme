<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main homepage" role="main">

		<?php
		include( 'template-parts/page-home.php');
		?>

		</main><!-- .site-main -->
		<?php get_footer(); ?>
	</div><!-- .content-area -->
