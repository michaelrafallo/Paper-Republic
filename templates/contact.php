<?php
    /*   Template Name: Contact   */

get_header();
?>

<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container">
    
    <h4 class="text-center my-5 pb-4 l-spacing text-uppercase"><?php the_title(); ?></h4>

    <div class="row">
        <?php if( get_the_post_thumbnail_url() ): ?>
        <div class="col-md-6 mb-3 d-none d-md-inline-block">
            <div class="img-container d-block">
                <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid">          
            </div>
            <div class="bg-l-green pt-3 pb-5 mb-5"></div>
        </div>
        <?php endif; ?>
    
        <div class="col-md-6 mb-3">
            <div class="divider-xs mb-3"></div>
            <h3 class="mb-3">contact us</h3>
            <div class="text-justify">
            <?php 
                the_post(); 
                the_content(); 
            ?>                
            </div>

            <div class="mb-5 d-md-none d-inline-block">
                <?php echo get_field('contact_address'); ?>              
            </div>

        </div>

        <div class="col-md-6 mb-5">
            <div class="border-2">
            <?php echo do_shortcode('[contact-form-7 id="102" title="Contact Us"]'); ?>  
            </div>                      
        </div>
        <div class="col-md-6 mb-5">

            <div class="d-none d-md-inline-block">
                <?php echo get_field('contact_address'); ?>           
            </div>

            <div class="divider-xs mb-3 mt-3"></div>
            <h3 class="mb-4">where to find us</h3>

            <?php echo str_replace(['<p>','</p>'], '', get_field('where_to_find_us')); ?>
            <div class="bg-l-green pt-3 pb-5"></div>

        </div>



    </div>

</div>

<?php
get_footer();