
<div class="main_banner">
	<div id="myCarousel" class="carousel slide bg-inverse carousel-fade" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/banner1.jpg" alt="First slide">
				<div class="cont">
					<div class="caption">
						<h1>EXPERTLY MADE, PERFECTLY YOU</h1>
						<a href="product.html" class="btn">ORDER NOW</a>
					</div><!--END OF CAPTION-->
				</div><!--END OF CONT-->
			</div><!--END OF CAROUSEL ITEM-->
		</div><!--END OF CAROUSEL INNER-->
	</div><!--END OF MY CAROUSEL-->
</div><!--END OF MAIN BANNER-->
<div class="clearfix"></div>


<div class="welcome">
	<div class="container">
		<div class="col-lg-8 offset-lg-2">
			<span></span>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab.</p>
			
			<a href="#" class="btn">Read More</a>
		</div><!--END OF CONTAINER-->
	</div><!--END OF COL LG 10-->

</div><!--END OF WELCOME-->

<div class="container">
	<div class="col-lg-12">
		
		<div class="product">
			<div class="heading">
				<h1>Products</h1>
			</div><!--END OF HEADING-->
			
			<div class="row">
				<div class="col-md-4 col-6">
					<div class="text_box">
						<h1>
							<span>Tasty,</span>
							<span>Delicious,</span>
							<span>Yummy &</span>
							<span>Healthy</span>
						</h1>
					</div><!--END OF TEXT-BOX-->
				</div><!--END OF COL MD 4-->
				
				<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 5
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							// wc_get_template_part( 'content', 'product' );
							
				?>
							
						<div class="col-md-4 col-6">
							<div class="product_box">
								<div class="img_box">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
									<div class="overlay">
										<a href="#" class="btn">View Product</a>
									</div><!--END OF OVERLAY-->
								</div><!--END OF IMG BOX-->
								<h3><?php echo get_the_title() ?></h3>
								<p><?php echo get_the_excerpt() ?></p>
							</div><!--END OF TEXT-BOX-->
						</div><!--END OF COL MD 4-->
				
				<?php
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
				?>
				
			
			</div><!--END OF ROW-->
		
		</div><!--END OF PRODUCT-->
		<div class="recipe">
			<div class="heading">
				<h1>Recipes</h1>
			</div><!--END OF HEADING-->
			
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						
						
						<?php
							$args = array(
								'post_type' => 'recipes',
								'posts_per_page' => 4
							);
							$loop = new WP_Query( $args );
							if ( $loop->have_posts() ) {
								while ( $loop->have_posts() ) : $loop->the_post();
									// wc_get_template_part( 'content', 'product' );
									
									?>

                                    <div class="col-6">
                                        <div class="thumbnail_box">
                                            <div class="inner">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                                                <div class="mask">
                                                    <a href="javascript:void(0)" target="recepe_<?php echo get_the_ID() ?>" class="btn big">View Recipe</a>
                                                    <p>Portion: <?php echo get_post_meta( get_the_ID(), 'recipes_additional_info_servings')[0]; ?>   |   Time: <?php echo get_post_meta( get_the_ID(), 'recipes_additional_info_cook_time')[0]; ?></p>
                                                </div><!--END OF MASK-->
                                            </div><!--END OF inner-->
                                            <h3><?php echo get_the_title() ?></h3>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                            <a href="javascript:void(0)" class="btn video" data-toggle="modal" data-src="<?php echo get_post_meta( get_the_ID(), 'recipes_additional_info_youtube_video_link')[0]; ?>" data-target="#myModal">Play Video <i class="fa fa-play"></i></a>
                                        </div><!--END OF THUMBNAIL BOX-->
                                        
                                        <div class="modal fade myModal_vid" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p><?php echo get_the_title(); ?></p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <!-- 16:9 aspect ratio -->
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item video_src" src=""  allowscriptaccess="always"></iframe>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div><!--END OF COL-6-->
									
									<?php
								endwhile;
							} else {
								// echo __( 'No products found' );
							}
							wp_reset_postdata();
						?>
                        
					</div><!--END OF ROW-->
				</div><!--END OF COL MD 6-->
				
				<div class="col-md-6">
					
					
					<?php
						$args = array(
							'post_type' => 'recipes',
							'posts_per_page' => 4
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
								// wc_get_template_part( 'content', 'product' );
								
								?>

                                <div class="big_img" id="divrecepe_<?php echo get_the_ID() ?>">
                                    <a href="#">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                                        <div class="capi">
                                            <h4><?php echo get_the_title() ?> </h4>
                                            <p>Portion: <?php echo get_post_meta( get_the_ID(), 'recipes_additional_info_servings')[0]; ?>   |   Time: <?php echo get_post_meta( get_the_ID(), 'recipes_additional_info_cook_time')[0]; ?></p>
                                        </div><!--END OF CAPI-->
                                    </a>
                                </div><!--END OF BIG IMG-->
								
								<?php
							endwhile;
						} else {
							echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
                    
				</div><!--END OF COL MD 6-->
                
			</div><!--END OF ROW-->
			<a href="<?php echo get_post_type_archive_link( 'recipes' ); ?>" class="btn">More Recipes</a>
		</div><!--END OF RECEIP-->
	</div><!--END OF COL LG 10-->

</div><!--END OF CONTAINER-->

<div class="bottom_colorful">
	<div class="container">
		<div class="col-lg-10 offset-lg-1">
			<div class="heading">
				<h1>Our Healthy Promise to You</h1>
			</div>
			<div class="row">
				<div class="col-md-3 col-6">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/ic1.png" alt="" class="img-fluid">
					<p>Gluten Free</p>
				</div><!--END OF COL MD 3-->
				
				<div class="col-md-3 col-6">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/ic2.png" alt="" class="img-fluid">
					<p>Grain Free</p>
				</div><!--END OF COL MD 3-->
				
				<div class="col-md-3 col-6">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/ic3.png" alt="" class="img-fluid">
					<p>Low Carbs</p>
				</div><!--END OF COL MD 3-->
				
				<div class="col-md-3 col-6">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/ic4.png" alt="" class="img-fluid">
					<p>Fresh</p>
				</div><!--END OF COL MD 3-->
			</div><!--END OF ROW-->
		</div><!--END OF COL LG 10-->
		<!-- <a href="#" class="btn">Learn More</a> -->
	</div><!--END OF COLORFULL-->
</div><!--END OF BOTTOM COLORFULL-->
<div id="social" class="social_society">
	<div class="container">
		<div class="col-lg-10 offset-lg-1">
			<div class="heading">
				<h1>SOCIAL SOCIETY</h1>
			</div><!--END OF HEADING-->
			<div class="popup-gallery row">
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g1.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g1.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 4-->
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g2.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g2.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 4-->
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g3.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g3.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 4-->
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g4.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g4.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 6-->
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g5.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g5.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 4-->
				
				<div class="col-md-3 col-6">
					<a  href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g6.jpg" title="Caption Here">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/g6.jpg" alt="" class="img-fluid"/>
					</a>
				</div><!--END OF COL MD 4-->
			</div><!--END OF GALLERY-->
		</div><!--END OF COL LG 10-->
	</div><!--END OF CONTAINER-->
</div><!--END OF SOCIAL SOCIETY-->
<div class="newsletter">
	<div class="container">
		<div class="col-lg-6 offset-lg-3 col-md-12">
			<h3>Subscribe</h3>
			<p>to the Snack Society, for the latest news, recipes and healthy treats by Kamilla.</p>
			<input type="text" class="form-control" placeholder="Enter email">
			<a href="#" class="btn">Subscribe</a>
		</div><!--END OF COL MD 6-->
	</div><!--END OF CONTAINER-->
</div><!--END OF NEWSLETTER-->
