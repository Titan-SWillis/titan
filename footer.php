<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Titan
 */

?>

<!-- IMPORTANT NOTE: DO NOT FORGET TO CHANGE THE CITY/STATE FOR LOCATION OF WEB DESIGN.
 		 TO FIND WHAT CITIES ARE LISTED IN SPECIFIC STATES YOU CAN CHOOSE FROM GO TO titanwebmarketingsolutions.com/*ENTER STATE HERE* -->

<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-offset-0 text-center">
				<a href="<?php echo esc_url( home_url() ); ?>"><img src="/images/logo.png" alt="Company Logo"></a>
			</div>
			<div class="col-xs-12 col-sm-10 footer-text text-center">
				<p class="footer-text">&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> | <a href="http://titanwebmarketingsolutions.com/tennessee/web-design-murfreesboro-tn/" target="_blank">Murfreesboro Web Design</a> by <a href="http://titanwebmarketingsolutions.com/" target="_blank">Titan Web Marketing Solutions</a>
				| <a href="/terms-of-service">Terms of Service &amp; Privacy Policy</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
