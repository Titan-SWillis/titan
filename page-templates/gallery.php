<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

<div class="row pt3 pb3 text-center">
	<div class="container">
		<div class="col-xs-12">
			<h1><b>Gallery</b></h1>
		</div>
	</div>
</div>

<div class="row pt3 pb3 text-center">
	<div class="container">
		<div class="pt3 pb3 mb1 mt1 gallery">
			<div class="col-xs-12 col-sm-3 no-pad">
				<?php echo do_shortcode('[gallery]'); ?>
			</div>
			<div class="col-xs-12 col-sm-3 no-pad">
				<?php echo do_shortcode('[gallery]'); ?>
			</div>
			<div class="col-xs-12 col-sm-3 no-pad">
				<?php echo do_shortcode('[gallery]'); ?>
			</div>
			<div class="col-xs-12 col-sm-3 no-pad">
				<?php echo do_shortcode('[gallery]'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
