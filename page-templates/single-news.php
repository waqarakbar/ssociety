<?php
	
	global $post;
	$post_slug = $post->post_name;
	$current_post = get_page_by_path( $post_slug, OBJECT, 'post' );
    
    // var_dump($current_post);
    
?>
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

                            <div class="col-md-12 col-6">

                                <!--<h3><?php /*echo get_the_title($current_post->ID) */?> </h3>-->
                                <img src="<?php echo get_the_post_thumbnail_url($current_post->ID) ?>" alt="" class="img-fluid">
                                <br>
                                <br>
                                <h3><?php echo get_the_title($current_post->ID) ?> </h3>
                                <p><?php echo get_post_field('post_content', $current_post->ID) ?></p>
                            </div><!--END OF TEXT-BOX-->
                        </div><!--END OF COL MD 4-->
                    </div><!--END OF ROW-->
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="author_inner">
                                    <img src="<?php echo get_bloginfo('template_directory') ?>/assets/images/welcome.jpg" alt="" class="img-thumbnail rounded-circle">
                                </div><!--END OF AUTHOR INNE-->
                            </div><!--END OF COL MD 2-->
                            <div class="col-md-12">
                                <p>The Snack Society is all about natural & unprocessed food. Its not about being on a diet for a certain time but more about a change in lifestyle. There is so much you can do with simple, natural ingredients and here we will show you how to do that. You don't have to wait till "cheat day" to enjoy a chocolate bar, you can do that in your own kitchen, using one of our recipes. I hope you enjoy what you find here as much as we enjoyed creating it. Have a wonderful day.-  <strong>-Kamilla</strong></p>
                            </div><!--END OF COL MD 7-->
                        </div>

                    </div>
                </div><!--End of col-md-9-->

            </div>
            

        </div><!--END OF PRODUCT-->
    </div><!--END OF RECEIP-->

</div><!--END OF CONTAINER-->
</div><!--END OF SWEETS-->