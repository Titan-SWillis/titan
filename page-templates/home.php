<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
			<div class="col-xs-12">
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
						the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
				?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
