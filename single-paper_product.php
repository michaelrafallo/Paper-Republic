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
<?php $setting_id = url_to_postid(site_url('page-settings')); ?>

<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container pt-5">

    <div class="row">
        <div class="col-12">

            <div class="d-md-none d-block">
                    <div class="divider-xs mb-3"></div>
                    <h3 class="mb-3"><?php the_title(); ?></h3>
                    <div class="text-justify mb-5"><?php the_post(); the_content(); ?></div>                    
                </div>

                <div class="row mb-5">

                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="row mx-0 product-gallery">
                            <?php 
                            foreach(get_field('galleries') as $gallery): 
                            $image = $gallery['sizes']['medium']; ?>  
                                  <div class="col-2 mb-2 px-1">
                                    <a href="#" class="img-thumb" data-src="<?php echo $gallery['sizes']['large']; ?>"> <img src="<?php echo $image; ?>" class="img-fluid"></a>
                                  </div>
                            <?php endforeach; ?>
                            </div>

                            <div class="img-container d-block">
                                <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid img-featured"> 
                            </div>
                            <div class="bg-l-green pt-3 pb-5 mb-md-5"></div>

                            <div class="d-none d-md-block"> 
                                <ul class="nav nav-tabs border-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link border-0 active" data-toggle="tab" href="#tab-1"> 
                                            <h5 class="font-italic my-2 mx-3">how to order</h5></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link border-0" data-toggle="tab" href="#tab-2"> 
                                            <h5 class="font-italic my-2 mx-3">shipping information</h5></a>
                                    </li>
                                </ul>
                  
                                <div class="tab-content p-5 bg-light">
                                  <div id="tab-1" class="tab-pane in active">
                                        <div class="text-justify mx-3"><?php echo get_field('how_to_order', $setting_id); ?></div>
                                  </div>
                                  <div id="tab-2" class="tab-pane">
                                       <div class="text-justify mx-3"><?php echo get_field('shipping_information', $setting_id); ?></div>
                                  </div>
                                </div>
                            </div>   

                        </div>
                        <div class="col-md-6 mb-5">

                            <div class="d-none d-md-block">
                                <div class="divider-xs mb-3"></div>
                                <h3 class="mb-3"><?php the_title(); ?></h3>
                                <div class="text-justify mb-4"><?php the_content(); ?></div>                    
                            </div>

                        
                            <table>
                                <tr>
                                    <td width="200">
                                        <h5 class="font-italic">starts at</h5>
                                    </td>
                                    <td>
                                        <h5 class="font-italic">available colors</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h2><b>$<?php echo get_field('price'); ?></b></h2></td>
                                    <td>
                                        <?php foreach(get_field('available_colors') as $row): ?>
                                        <span class="px-2 rounded-circle mr-2 border-c" style="background-color: <?php echo $row['color']; ?>;"></span>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </table>
                            
                            <hr>

                            <h5 class="font-italic">available sizes</h5>
                            <?php foreach(get_field('available_sizes') as $row): ?>
                            <span class="mr-2"><?php echo $row['size']; ?></span> 
                            <?php endforeach; ?>

                            <?php foreach(get_field('custom_variants') as $custom_variants): ?>
                            <hr>
                            <table>
                                <tr>
                                    <td width="200">
                                        <h5 class="font-italic"><?php echo $custom_variants['name']; ?></h5>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php foreach($custom_variants['variants'] as $variants): ?>
                                <tr>
                                    <td valign="top"><p><?php echo $variants['name']; ?></p></td>
                                    <td>
                                        <?php if( $variants['colors'] ): ?>
                                            <div class="mb-2">
                                            <?php foreach($variants['colors'] as $variant): ?>
                                            <span class="px-2 rounded-circle mr-2 border-c" style="background-color: <?php echo $variant['color']; ?>;"></span>
                                            <?php endforeach; ?>                                    
                                            </div>
                                        <?php endif; ?>

                                        <?php if( $variants['images'] ): ?>
                                            <div class="row">
                                            <?php 
                                            $p=0;
                                            foreach($variants['images'] as $v_image): ?>
                                            <div class="col-md-3 p-0 my-1 mx-1">
                                                <a href="#<?php echo str_replace(' ', '-', $variants['name']); ?>" data-toggle="modal" data-slide-to="<?php echo $p; ?>">
                                                <img src="<?php echo $v_image['sizes']['thumbnail']; ?>" class="img-thumbnail w-100">
                                                </a>
                                            </div>
                                            <?php 
                                            $p++;
                                            endforeach; ?>                                  
                                            </div>

                                        <div class="modal fade carousel slide position-fixed" id="<?php echo str_replace(' ', '-', $variants['name']); ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo $custom_variants['name']; ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Indicators -->
                                                        <ul class="carousel-indicators">
                                                            <?php 
                                                            $p=0;
                                                            foreach($variants['images'] as $v_image): ?>
                                                            <li data-target="#<?php echo str_replace(' ', '-', $variants['name']); ?>" data-slide-to="<?php echo $p; ?>" class="<?php echo $p==0 ? 'active' : ''; ?>"></li>
                                                            <?php 
                                                            $p++;
                                                            endforeach; ?>
                                                        </ul>
                                                        <!-- The slideshow -->
                                                        <div class="carousel-inner">
                                                            <?php 
                                                            $p=0;
                                                            foreach($variants['images'] as $v_image): ?>
                                                            <div class="carousel-item <?php echo $p==0 ? 'active' : ''; ?>">
                                                                <h4><b>#<?php echo $p; ?></b>. <?php echo $variants['name']; ?></h4>
                                                                <div class="text-center">
                                                                    <img src="<?php echo $v_image['sizes']['large'] ?>" class="img-fluid w-100 img-thumbnail">                                                  
                                                                </div>
                                                            </div>
                                                            <?php 
                                                            $p++;
                                                            endforeach; ?>
                                                        </div>
                                                        <!-- Left and right controls -->
                                                        <a class="carousel-control-prev" href="#<?php echo str_replace(' ', '-', $variants['name']); ?>" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#<?php echo str_replace(' ', '-', $variants['name']); ?>" data-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php endforeach; ?>

                            <div class="d-block d-md-none how-to-order"> 
                                <ul class="nav nav-tabs border-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link border-0 active" data-toggle="tab" href="#tab-1m"> 
                                            <h5 class="font-italic my-2 mx-sm-3">how to order</h5></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link border-0" data-toggle="tab" href="#tab-2m"> 
                                            <h5 class="font-italic my-2 mx-sm-3">shipping information</h5></a>
                                    </li>
                                </ul>
                  
                                <div class="tab-content py-5 px-sm-5 px-4 bg-light">
                                  <div id="tab-1m" class="tab-pane in active">
                                        <div class="text-justify mx-3"><?php echo get_field('how_to_order', $setting_id); ?></div>
                                  </div>
                                  <div id="tab-2m" class="tab-pane">
                                       <div class="text-justify mx-3"><?php echo get_field('shipping_information', $setting_id); ?></div>
                                  </div>
                                </div>
                            </div>   

                            <div class="mt-md-5 pt-md-5">
                                <a href="<?php echo site_url().'/order?id='.$post->ID; ?>" class="btn btn-blue f-didot font-italic btn-lg rounded-0 btn-block py-3 l-spacing">customize your own today <i class="fa fa-square f-6 ml-2 align-middle"></i></a>                
                            </div>
                        </div>
                    </div>
                </div>

            
        </div>
    </div>

    
</div>

<style>
.carousel-control-next span, .carousel-control-prev span {
    background-color: rgba(113,157,185,0.5);
    border-radius: 100%;
    background-size: 20px;
    padding: 25px;
}
.carousel-indicators li {
    border-radius: 100%;
    height: 15px;
    width: 15px;
    cursor: pointer;
    border: 1px solid rgba(113,157,185,0.5);
}
.carousel-indicators li.active {
    background-color: rgba(113,157,185,0.5);
}
</style>

<?php get_footer(); ?>
<script type="text/javascript">
jq = jQuery;
jq(document).on('click', '.img-thumb', function(e){
	e.preventDefault();
	var src = jq(this).attr('data-src');
	jq('.img-featured').fadeIn().attr('src', src);
});
</script>