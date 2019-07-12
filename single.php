<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paper
 */

get_header();
?>
<div class="container pt-5">
	<div class="row mb-4">
		<div class="col-lg-10 mx-lg-auto">

			<?php the_post();?>

			<div class="divider-xs"></div>
			<h3 class="my-4"><?php the_title(); ?></h3>

			<?php if( get_the_post_thumbnail_url() ): ?>
			<div class="img-container d-block">
				<img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid">
			</div>
			<div class="bg-l-green pt-3 pb-5 mb-3"></div>
			<?php endif; ?>

			<div class="text-justify">
			<p>Posted on <?php echo date('F d, Y', strtotime($post->post_date)); ?> by <?php the_author(); ?></p>
			<?php the_content(); ?>			
			</div>

		</div>		
	</div>	
</div>
<?php
get_footer();
