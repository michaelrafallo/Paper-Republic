<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=<?php echo date('YmdHis')?>">
</head>


<body <?php body_class(); ?>>

	<div class="d-none d-md-block">
	    <div class="bg-l-gray py-4"></div>
		<div class="container">
			<div class="text-center mt-5 mb-4">
				<a href="<?php echo site_url(); ?>">
			    <?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			     ?>       	
			     <img src="<?php echo $logo[0]; ?>" height="30">
				</a>   
			</div>
		</div>		
	</div>

	<nav class="navbar-light navbar-expand-md header-nav mb-md-3 mb-1 pt-md-1 pt-0 pb-4 sticky-top bg-white">
	    <div class="bg-l-gray py-4 d-md-none d-block"></div>

	    <div class="container-fluid mt-4 mt-md-0 px-4">

		        <button class="navbar-toggler border-0 py-2" type="button" >
		        <span class="fas fa-bars"></span>
		        </button>		

	    		<div class="mob-logo text-center d-block d-md-none">
	    			<img src="<?php echo $logo[0]; ?>" height="25">
	    		</div>

	        <!-- Navbar: Collapse -->
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">

	            <!-- Navbar navigation: Left -->
	            <ul class="navbar-nav mt-5 mt-md-0 mx-auto text-uppercase text-center">

           		<?php $primary_menu = wp_get_nav_menu_items('primary-menu'); ?>
            	<?php 
            	$m=1;
            	foreach($primary_menu as $pm): 
            		$active = ( $pm->object_id == get_queried_object_id() ) ? 'active' : '';
            	?>
                <li class="nav-item mx-md-3">
                	<?php if($m!=1): ?>
                	<div class="divider-xs d-inline-block d-md-none" style="max-width: 25px;"></div>
	                <?php endif; ?>
                    <a class="nav-link <?php echo $active; ?>" href="<?php echo $pm->url; ?>"><?php echo $pm->title; ?></a>
                </li>
            	<?php 
            	$m++;
            	endforeach; ?>

	            </ul>
	        </div>
	        <!-- / .navbar-collapse -->
	    </div>
	    <!-- / .container -->
	</nav>