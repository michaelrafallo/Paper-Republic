<?php
    /*   Template Name: Blogs   */

get_header();

global $wp_query, $query_string;


$paged = ( get_query_var( 's' ) ) ? get_query_var( 's' ) : 1;
if( @$_GET['pg'] ) {
    $paged = $_GET['pg'];    
}

// query_posts("{$query_string}&posts_per_page=10&paged={$paged}");
$count = ($atts['count']!=-1) ? $atts['count'] : 9;

$query = array(
    'paged' => $paged,
    'posts_per_page' => $count,
    'post_type' => 'post',
    'order'     => 'DESC',
    'orderby'   => 'ID'
);

if( $_GET['q'] ) {
    $query['s'] = $s;
}

if( $atts['category'] ):
$query['tax_query'] = array(
        array(
            'taxonomy'   => 'category',
            'terms'     => $atts['category'],
            'field'   => 'slug',
        )
    );
endif;

if( @$atts['exclude_id'] ):
    $query['post__not_in'] = [$atts['exclude_id']];
endif;

$rows = new WP_Query( $query );

?>

<div class="divider-xs mx-auto mb-5 d-none d-md-block"></div>

<div class="container">
    <h4 class="text-center mt-5 pb-5 l-spacing text-uppercase">THE BLOG</h4>

    <div class="row">
    <?php if($rows->have_posts()): ?>
    <?php while ( $rows->have_posts() ) : $rows->the_post(); ?>
        <div class="col-md-6 mb-5">
            <div class="divider-xs mb-3"></div>
            <h3><?php the_title(); ?></h3>
            <p class="date-posted text-uppercase"><?php echo date('F d, Y', strtotime($post->post_date)); ?></p>
            <p class="text-justify mb-3"><?php echo mb_strimwidth(strip_tags(strip_shortcodes($post->post_content)), 0, 300, '...'); ?></p>
            <div class="mb-4">
                <a href="<?php the_permalink(); ?>"><strong>Read more</strong> <i class="fa fa-angle-right"></i></a>         
            </div>

            <?php if( get_the_post_thumbnail_url() ): ?>
            <div class="img-container d-block">
                <a href="<?php the_permalink(); ?>">
                <div class="img-overlay d-flex align-items-center">
                    <h5 class="text-uppercase text-white mx-auto">
                        <?php the_title(); ?>
                    </h5>
                </div>
                </a>
                <img src="<?php echo the_post_thumbnail_url('large'); ?>" class="img-fluid"> 
            </div>
            <div class="bg-l-green pt-3 pb-5"></div>
            <?php endif; ?>

        </div>

    <?php endwhile; ?>
    <?php endif; ?>
        
    </div>
</div>

<?php echo pr_pagination( $rows->max_num_pages ); ?>


<?php
get_footer();