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

$term = get_queried_object();

$query = array(
	'post_type' => 'paper_product',
    'posts_per_page' => -1,
    'order'     => 'ASC',
    'orderby'   => 'ID',
	'tax_query' => array(
		array(
			'taxonomy' => 'product_category',
			'terms' => get_queried_object()->slug,
			'field' => 'slug',
			'operator' => 'IN'
		)
	),
);
$rows = new WP_Query( $query );
?>   

<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container pt-5">

	<div class="row">
	    
	    <div class="col-md-4 pl-3 pr-md-4 mb-5 d-none d-md-inline-block">
	    	<?php $image = get_field('image', $term)['sizes']['medium']; ?>
	        <img src="<?php echo site_url('wp-content/uploads/2018/10/title.png'); ?>" class="img-fluid"> 
	    </div>

	    <div class="col-md-8">
	        <h3><?php echo $term->name; ?></h3>
	        <p class=" text-justify"><?php echo $term->description; ?></p>
	    </div>

	 </div>

	<?php if( $rows->post_count ): ?>

	<div class="text-center my-5">
		<div class="divider-md mx-auto"></div>
	 	<h6 class="text-uppercase bg-white divider-title">choose form</h6>	 	
	</div>

    <div class="text-center mb-5 py-4 d-none d-md-block">

	<?php $c=1; ?>
	<?php if($rows->have_posts()): ?>
	<?php while ( $rows->have_posts() ) : $rows->the_post(); ?>
   
    	<?php if($c!=1): ?>
    	<i class="fas fa-square fa-bullet mx-2"></i>
	    <?php endif; ?>

    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

	<?php $c++; ?>
	<?php endwhile; ?>
	<?php endif; ?>    

    </div>

	<div class="row px-3 photobook-lg pt-4 pt-md-0">
	
	<?php if($rows->have_posts()): ?>

		<?php while ( $rows->have_posts() ) : $rows->the_post(); ?>
		<div class="col-md-6 mb-md-2 mb-5 px-1">
			<h5 class="d-block d-md-none mb-3"><i class="fas fa-square fa-bullet mx-2"></i><?php the_title(); ?></h5>

			<a href="<?php the_permalink(); ?>">
			<div class="img-container d-block">
				
				<div class="img-overlay d-flex align-items-center">
					<h5 class="text-uppercase text-white mx-auto">
						<?php the_title(); ?>
					</h5>
				</div>

				<?php if( get_the_post_thumbnail_url() ): ?>
		        <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid"> 
		        <?php endif; ?> 

		    </div>
		    </a>

		    <div class="bg-l-green pt-3 pb-5"></div>

		</div>
		
		<?php endwhile; ?>

	<?php endif; ?>
	
	</div>

	<?php endif; ?>

</div>

<?php
get_footer();