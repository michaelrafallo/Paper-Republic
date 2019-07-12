<?php
    /*   Template Name: Order   */

get_header();


?>


<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container">
    <h4 class="text-center mt-5 pb-5 l-spacing text-uppercase">ORDER</h4>

    <div class="row">
        <div class="col-md-6 mb-5 d-none d-md-inline-block">
            <?php if( get_the_post_thumbnail_url() ): ?>
            <div class="img-container d-block">
                <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid"> 
            </div>
            <div class="bg-l-green pt-3 pb-5"></div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 mb-5">
            <div class="divider-xs mb-3"></div>
            <h3 class="mb-3"><?php the_title(); ?></h3>
            <div class="text-justify mb-3"><?php the_post(); the_content(); ?></div>
        </div>
    </div>
</div>



<div class="container mb-5 pb-4">
    <div class="border-2 mx-3">
        <?php echo do_shortcode('[contact-form-7 id="117" title="Order Form"]'); ?>
    </div>
</div>

<?php get_footer(); ?>
<script>
jq = jQuery;
<?php if( $pid = @$_GET['id']): ?>
var sizes = <?php echo json_encode(get_field('available_sizes', $pid)); ?>;        
jq.each(sizes, function (i, item) {
    jq('[name="size"]').append(jq('<option>', { 
        value: item.size,
        text : item.size 
    })); 
});  

<?php foreach(get_field('custom_variants', $pid) as $custom_variants): ?>
var sizes = <?php echo json_encode($custom_variants['variants']); ?>;        
jq.each(sizes, function (i, item) {
    jq('[name="<?php echo $custom_variants['name']; ?>"]').append(jq('<option>', { 
        value: item.name,
        text : item.name 
    })); 
});  
<?php endforeach; ?>



jq('[name="product"]').val("<?php echo get_the_title($pid); ?>");
jq('.p-product').html("<?php echo get_the_title($pid); ?>");

<?php $categories = implode(', ', wp_get_post_terms($pid, 'product_category', ['fields'=>'names'])); ?>
jq('[name="product-type"]').val("<?php echo $categories; ?>");
jq('.p-product-type').html("<?php echo $categories; ?>");
<?php endif; ?>

</script>
