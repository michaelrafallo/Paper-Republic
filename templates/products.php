<?php
    /*   Template Name: Products   */

get_header();

$terms = get_terms( array(
    'taxonomy'   => 'product_category',
    'hide_empty' => false,
	'orderby'    => 'term_id',
	'order'      => 'ASC',
) );
?>


<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>


<div class="container pt-5">
    <div class="mb-5">
        <div class="row mb-md-4 mb-5">
            <div class="col-md-4 pr-md-5 mb-5 d-none d-md-inline-block">
                <img src="<?php echo get_header_image(); ?>" class="img-fluid"> 
            </div>
            <div class="col-md-8">
                <div class="d-md-none d-block">
                    <div class="divider-xs mb-3"></div>
                    <h3 class="mb-5">our products</h3>                    
                </div>
                <div class="row text-center">
                    <?php foreach($terms as $term):
                    $image = get_field('image', $term)['sizes']['medium']; ?>  

                    <div class="col-md col-4 px-3">
                        <a href="<?php echo site_url().'/product_category/'.$term->slug; ?>">
                        <img src="<?php echo $image; ?>" class="rounded-circle mx-1 img-fluid mb-4">  
                        </a>                   
                    </div>                    
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row">

    		<?php foreach($terms as $term): 
			$image = get_field('image', $term)['sizes']['large']; ?>       	
            <div class="col-md-6 mb-5">
                <div class="divider-xs mb-3"></div>
                <h3 class="mb-3"><a href="<?php echo site_url().'/'.$term->slug; ?>"><?php echo $term->name; ?></a></h3>
                <p class="text-justify mb-5"><?php echo $term->description; ?></p>
                <div class="img-container d-block">
                    <a href="<?php echo site_url().'/product_category/'.$term->slug; ?>">
                    <div class="img-overlay d-flex align-items-center">
                        <h5 class="text-uppercase text-center text-white mx-auto">
                            <?php echo $term->name; ?>
                        </h5>
                    </div>
                    </a>
                    <img src="<?php echo $image; ?>" class="img-fluid"> 
                </div>
                <div class="bg-l-green pt-3 pb-5"></div>
            </div>
		    <?php endforeach; ?>

        </div>
    </div>
</div>


<?php
get_footer();
