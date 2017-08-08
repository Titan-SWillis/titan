<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Titan
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<style media="screen">
.form-control {
	padding: 0px 12px;
	border: none;
}
</style>

<form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<label for="<?php echo $unique_id; ?>">
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'titan' ); ?></span>
		</label>
		<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'titan' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</div>
	<button type="submit" class="btn btn-warning">Search</button>
</form>
