<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paper
 */

?>
<?php $setting_id = url_to_postid(site_url('page-settings')); ?>

	    <div class="bg-l-gray py-5 mt-5">
		    <footer class="container mb-0">
		    	<div class="row">
		    		<div class="col-md-2 pr-5 text-center text-md-left">
		    			<a href="<?php echo site_url(); ?>">
					    <?php 
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							echo '<img src="'. esc_url( $logo[0] ) .'" class="footer-logo img-fluid mb-4 mt-2">';
					     ?>   
					     </a>
		    			<div class="socials">
							<ul class="list-inline d-md-flex justify-content-between align-items-center">
	                        <?php 
	                        if( $socials = get_field('socials', $setting_id)):
	                        foreach($socials as $social):?>
							<li class="list-inline-item"><a href="<?php echo $social['link']; ?>"><i class="<?php echo $social['name']; ?>"></i></a></li>
	                        <?php endforeach; ?>
		                    <?php endif; ?>
							</ul>			    	
		    			</div>
		    		</div>

		    		<div class="col-md-7 col-sm-6 order-2 order-md-1 d-none d-md-inline-block">
		    			<div class="row footer-center px-md-4">
		    				<div class="col-md-3 col-6 px-3">
		    					<ul class="list-unstyled">

				           		<?php $primary_menu = wp_get_nav_menu_items('footer-col-1'); ?>
				            	<?php foreach($primary_menu as $pm): 
				            		$active = ( $pm->object_id == get_queried_object_id() ) ? 'active' : '';
				            	?>
								<li class="mb-3 text-lowercase"><a href="<?php echo $pm->url; ?>" class="<?php echo $active; ?>"><?php echo $pm->title; ?></a></li>
				            	<?php endforeach; ?>

		    					</ul>
		    				</div>
		    				<div class="col-md-3 col-6 px-3">
		    					<ul class="list-unstyled">
			    					<li class="mb-3 text-lowercase"><a href="<?php echo site_url(); ?>/products">Products</a></li>
			    				</ul>
		    					<ul class="list-unstyled f-10 text-lowercase">
									<?php 
									$terms = get_terms( array(
									    'taxonomy'   => 'product_category',
									    'hide_empty' => false,
										'orderby'    => 'term_id',
										'order'      => 'ASC',
									) );
									?>
									<?php foreach($terms as $term): ?>
		    						<li class="mb-1"><a href="<?php echo site_url().'/product_category/'.$term->slug; ?>"><?php echo $term->name; ?></a></li>
		    						<?php endforeach; ?>
		    					</ul>
		    				</div>
		    				<div class="col-md-3 col-6 px-3">
		    					<ul class="list-unstyled">
			    					<li class="mb-3 text-lowercase"><a href="<?php echo site_url(); ?>/about">About</a></li>
			    				</ul>
		    					<ul class="list-unstyled f-10 text-lowercase">
				           		<?php $primary_menu = wp_get_nav_menu_items('footer-col-3'); ?>
				            	<?php foreach($primary_menu as $pm): 
				            		$active = ( $pm->object_id == get_queried_object_id() ) ? 'active' : '';
				            	?>
								<li class="mb-1"><a href="<?php echo $pm->url; ?>" class="<?php echo $active; ?>"><?php echo $pm->title; ?></a></li>
				            	<?php endforeach; ?>
		    					</ul>
		    				</div>
		    				<div class="col-md-3 col-6 px-3">
		    					<ul class="list-unstyled">
			    					<li class="mb-3 text-lowercase"><a href="<?php echo site_url(); ?>/contact">Contact</a></li>
			    				</ul>
		    					<ul class="list-unstyled f-10 text-lowercase">
				           		<?php $primary_menu = wp_get_nav_menu_items('footer-col-4'); ?>
				            	<?php foreach($primary_menu as $pm): 
				            		$active = ( $pm->object_id == get_queried_object_id() ) ? 'active' : '';
				            	?>
								<li class="mb-1"><a href="<?php echo $pm->url; ?>" class="<?php echo $active; ?>"><?php echo $pm->title; ?></a></li>
				            	<?php endforeach; ?>
		    					</ul>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="subscribe-form col-md-3 col-sm-6 pl-md-5 order-1 order-md-2 mb-3 d-none d-md-inline-block">
		    			<p>stay in touch</p>
		    			<?php echo do_shortcode('[contact-form-7 id="118" title="Stay in touch"]'); ?>
		    		</div>
		    	</div>
		    </footer>	    	
	    </div>
		
		<?php wp_footer(); ?>
    	
    	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		jq = jQuery;
		jq(document).on('click', '.form-submit', function(e){
			e.preventDefault();
			jq(this).closest('form').submit();
		});
		jq(window).scroll(function() {
		    if (jq(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
		        jq('#return-to-top').fadeIn(200);    // Fade in the arrow
		    } else {
		        jq('#return-to-top').fadeOut(200);   // Else fade out the arrow
		    }
		});
		jq('#return-to-top').click(function() {      // When arrow is clicked
		    jq('body,html').animate({
		        scrollTop : 0                       // Scroll to top of body
		    }, 500);
		});   

		jq(document).on('click', '.navbar-toggler', function() {
			jq('body').toggleClass('no-scroll');
			jq(this).find('span').toggleClass('fa-bars fa-times');
			jq(this).closest('nav').toggleClass('show');
			jq(this).closest('nav').find('.collapse').toggleClass('show');
		});
	</script>
    </body>
</html>