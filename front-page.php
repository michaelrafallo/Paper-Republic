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

<div class="container pt-md-0 pt-5">
<?php
	the_post();
	the_content();
?>
</div>

<div class="container pb-5">
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="divider-xs"></div>
			<h3 class="mt-4 mb-5">our products</h3>
		</div>

	<?php 
	$terms = get_terms( array(
	    'taxonomy'   => 'product_category',
	    'hide_empty' => false,
		'orderby'    => 'term_id',
		'order'      => 'ASC',
	) );
	foreach($terms as $term):
		$image = get_field('image', $term)['sizes']['medium']; ?>  

	  <div class="col-lg col-md col-sm-4 col-4 mb-4 px-4">
	  	<a href="<?php echo site_url().'/product_category/'.$term->slug; ?>"><img src="<?php echo $image; ?>" class="rounded-circle img-fluid"></a>
	  </div>
	<?php endforeach; ?>

	  <div class="col-lg col-md col-sm-4 col-4 mb-4 px-4">
	  	<a href="<?php echo site_url('products'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/view-all.png" class="rounded-circle img-fluid mb-4"></a>
	  </div>
	</div>
</div>


<?php
get_footer();
