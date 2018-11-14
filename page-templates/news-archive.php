<div class="sweets">
	<div class="container">
		<div class="banner_share">
			<ul class="social">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<!-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div><!--END OF BANNER SHARE-->
	</div><!--END OF CONTAINER-->
	
	<div class="container">
		<div class="recipe">
			<div class="sort">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2>Latest News</h2>
					</div><!--END OF COL MD 3-->
				
				</div><!--END OF ROW-->
			</div><!---END OF SORT-->
			<div class="product">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							
							
							<?php
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 6
								);
								$loop = new WP_Query( $args );
								if ( $loop->have_posts() ) {
									while ( $loop->have_posts() ) : $loop->the_post();
										// wc_get_template_part( 'content', 'product' );
										
										?>
										
										<div class="col-md-4 col-6">
											<div class="product_box">
												<div class="img_box">
													<img src="<?php echo get_the_post_thumbnail_url(); ?>)" alt="" class="img-fluid">
													<div class="overlay">
														<a href="<?php echo get_the_permalink() ?>" class="btn">Read More</a>
													</div><!--END OF OVERLAY-->
												</div><!--END OF IMG BOX-->
												<h3><?php echo get_the_title(); ?> </h3>
												<p><?php echo get_the_excerpt(); ?></p>
											</div><!--END OF TEXT-BOX-->
										</div><!--END OF COL MD 4-->
										
										<?php
									endwhile;
								} else {
									echo __( 'No news found' );
								}
								wp_reset_postdata();
							?>
							
							
						
						</div><!--END OF ROW-->
						<div class="pagi">
							<ul class="list-unstyled">
								<li><span>More Sweets</span></li>
								<li><a href="#" class="active">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/arrow.png" alt=""></a></li>
							</ul>
						</div>
					</div><!--End of col-md-9-->
					
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">
								<div class="author_inner">
									<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/welcome.jpg" alt="" class="img-thumbnail rounded-circle">
								</div><!--END OF AUTHOR INNE-->
							</div><!--END OF COL MD 2-->
							<div class="col-md-12">
								<p>The Snack Society is all about natural & unprocessed food. Its not about being on a diet for a certain time but more about a change in lifestyle. There is so much you can do with simple, natural ingredients and here we will show you how to do that. You don't have to wait till "cheat day" to enjoy a chocolate bar, you can do that in your own kitchen, using one of our recipes. I hope you enjoy what you find here as much as we enjoyed creating it. Have a wonderful day.-  <strong>-Kamilla</strong></p>
							</div><!--END OF COL MD 7-->
						</div>
					
					</div>
				</div><!--END OF PRODUCT-->
			</div>
		</div><!--END OF RECEIP-->
	
	</div><!--END OF CONTAINER-->
</div><!--END OF SWEETS-->