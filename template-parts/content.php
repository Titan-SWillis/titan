<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Titan
 */

?>

<div class="row">
	<div class="container" style="margin-bottom: 1em; padding: 0px">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta" style="padding-top: 1em">
						<?php titan_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->
				<div class="entry-content" style="padding-top: 1em">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'titan' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'titan' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
				<footer class="entry-footer">
					<?php titan_entry_footer(); ?>
				</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
	</div>
</div>
