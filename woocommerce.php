<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Titan
 */

get_header(); ?>

<div class="row squigly pt3 pb3">
	<div class="container">
		<div class="col-xs-12">
			<?php woocommerce_content(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
