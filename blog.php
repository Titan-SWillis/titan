<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
				<?php
					$query = new WP_Query( array(
						'post_type' => 'post',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'date',
					) );
					if ( $query->have_posts() ) { ?>
		      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-xs-12 mt3 mb3">
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail( 'thumbnail' );
									}
									?>
							</a>
							<a href="<?php the_permalink(); ?>">
								<h4><b><?php the_title(); ?></b></h4>
							</a>
							<p>
								<?php the_excerpt(); ?>
							</p>
							<a class="buttons" style="text-decoration: none;" href="<?php the_permalink(); ?>">
								Read More
							</a>
						</div>
					<?php endwhile;
					} ?>
			</div>
		</div>

<?php get_footer(); ?>
