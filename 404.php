<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package paper
 */

get_header();
?>

<div class="container mb-5">
	<?php the_post(); ?>
	<div class="divider-xs"></div>
	<h3 class="my-4"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'paper' ); ?></h3>

	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'paper' ); ?></p>
</div>

<?php
get_footer();
