<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paper
 */

get_header();
?>

<div class="container">
	<?php the_post(); ?>
	<div class="divider-xs"></div>
	<h4 class="my-4 l-spacing text-uppercase"><?php the_title(); ?></h4>
	<?php the_content(); ?>
</div>

<?php
get_footer();