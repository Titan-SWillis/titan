<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Titan
 */

get_header(); ?>

	<div class="row">
		<div class="container">
		<div class="col-xs-12" style="margin-bottom: 1em; padding-top: 1em">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
					the_post_navigation();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</div>
			<div class="col-xs-12">
				<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
				<br>
					<div class="author-info">
						<h3 class="author-title">Written by <?php the_author_link(); ?></h3>
						<p class="author-description"><?php the_author_meta('description'); ?></p>
						<p>Website: <a href="<?php the_author_meta('user_url');?>"><?php the_author_meta('user_url');?></a></p>
						<ul class="icons">
								<?php
									$rss_url = get_the_author_meta( 'rss_url' );
									if ( $rss_url && $rss_url != '' ) {
										echo '<li class="rss"><a href="' . esc_url($rss_url) . '"></a></li>';
									}
									$google_profile = get_the_author_meta( 'google_profile' );
									if ( $google_profile && $google_profile != '' ) {
										echo '<li class="google"><a href="' . esc_url($google_profile) . '" rel="author"></a></li>';
									}
									$twitter_profile = get_the_author_meta( 'twitter_profile' );
									if ( $twitter_profile && $twitter_profile != '' ) {
										echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"></a></li>';
									}
									$facebook_profile = get_the_author_meta( 'facebook_profile' );
									if ( $facebook_profile && $facebook_profile != '' ) {
										echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"></a></li>';
									}
									$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
									if ( $linkedin_profile && $linkedin_profile != '' ) {
										echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"></a></li>';
									}
								?>
					</ul>
				</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
