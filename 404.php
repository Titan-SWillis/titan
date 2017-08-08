<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Titan
 */

get_header(); ?>

	<div class="row">
		<div class="container">
			<div class="col-sm-10 col-sm-offset-1 text-center">
				<section class="error-404 not-found">
					<header >
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'titan' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<br>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'titan' ); ?></p>

						<?php get_search_form(); ?>
						<br>
						<p><a href="../"><span class="glyphicon glyphicon-home"></span> Return to Home Page</a></p>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php get_footer(); ?>