<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paper
 */

get_header();
?>
<?php the_post(); ?>

<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container">
    <h4 class="text-center mt-5 pb-5 l-spacing text-uppercase"><?php the_title(); ?></h4>
	<?php the_content(); ?>
</div>

<?php
get_footer();