<?php
	
	global $post;
	$post_slug = $post->post_name;
	$current_recipe = get_page_by_path( $post_slug, OBJECT, 'recipes' );
    
    // var_dump($current_recipe);
    
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
                    <div class="col-md-4 col-12">
                        <h2><?php echo get_the_title($post->ID); ?></h2>
                    </div><!--END OF COL MD 3-->
                </div><!--END OF ROW-->
            </div><!---END OF SORT-->
            <div class="row">
                <div class="col-md-9">
                    <div class="recipe_left">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="perp">
                                    <h4>PREP: <span><?php echo get_post_meta( $current_recipe->ID, 'recipes_additional_info_prep_time')[0]; ?></span> </h4>
                                    <h4>COOK:: <span><?php echo get_post_meta( $current_recipe->ID, 'recipes_additional_info_cook_time')[0]; ?></span> </h4>
                                    <h4>SERVING: :<span><?php echo get_post_meta( $current_recipe->ID, 'recipes_additional_info_servings')[0]; ?></span> </h4>
                                </div><!--END OF PREP-->
                            </div><!--END OF COL MD 3-->
                            <div class="col-md-9">
                                <img src="<?php echo get_the_post_thumbnail_url($current_recipe->ID) ?>" alt="" class="img-fluid">
                            </div><!--END OF COL MD 9-->
                        </div><!--END OF ROW-->
                    </div><!--END OF RECIPE LEFT-->

                    <div class="recipe_des">
                        <p><?php echo get_post_field('post_content', $current_recipe->ID) ?></p>
                    </div><!--END OF RECIPE DES-->
                    <div class="clearfix"></div>
                    <div class="description reci">
                        <div class="container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">WHAT YOU NEED</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" role="tab" data-toggle="tab">METHOD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab3" role="tab" data-toggle="tab">Tips</a>
                                </li>
                            </ul>
                        </div><!--END OF CONTAINER-->
                    </div><!--END OF DESCRIPTION-->
                    <div class="container">
                        <div class="tab_detail rec_detail">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="tab1">
                                    <div class="row">
	
	                                    <?php
		
		                                    $ingredients = get_post_meta( $current_recipe->ID, 'recipe_ingredients_group_demo')[0];
		                                    // var_dump($ingredients);
	                                    ?>
	
	                                    <?php if(count($ingredients) > 0): ?>
	
                                            <div class="col-md-6">
                                                <h4>Ingredients For <?php echo get_the_title($post->ID); ?></h4>
                                                <ul class="list-unstyled">
                                                <?php $snn = 0; ?>
                                                <?php foreach ($ingredients as $ingredient): ?>
                                                    
                                                    <?php if($snn%4 == 0 and $snn != 0): ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Ingredients For <?php echo get_the_title($post->ID); ?></h4>
                                                            <ul class="list-unstyled">
                                                    <?php endif; ?>
                                                                <li><img src="<?php echo get_bloginfo('template_directory') ?>/assets/images/list.png"><?php echo $ingredient['title'] ?></li>
                                                <?php $snn++; ?>
                                                    
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            
	                                    <?php else: ?>
                                            <div class="col-md-6">
                                                <h4>Ingredients not published..</h4>
                                            </div>
	                                    <?php endif; ?>
                                    
                                    </div><!--END OF ROW-->


                                </div><!--END OF TAB PANEL-->
                                <div role="tabpanel" class="tab-pane fade" id="tab2">
                                    <p><?php echo get_post_meta( $current_recipe->ID, 'recipes_additional_info_method')[0]; ?>.</p>

                                </div><!--END OF TAB PANEL-->

                                <div role="tabpanel" class="tab-pane fade" id="tab3">
                                    <p><?php echo get_post_meta( $current_recipe->ID, 'recipes_additional_info_tips')[0]; ?></p>

                                </div><!--END OF TAB PANEL-->
                            </div>
                        </div><!--END OF TAB DETAIL-->
                    </div><!--END OF CONTAINER-->
                </div><!--END OF COL MD 9-->
                <div class="col-md-3">
                    <div class="recipe_author">
                        <img src="<?php echo get_bloginfo('template_directory') ?>/assets/images/welcome.jpg" alt="" class="img-fluid">
                    </div><!--END OF RECIPE AUTHOR-->
                </div><!--END OF COL MD 3-->
            </div><!--END OF ROW-->

        </div><!--END OF RECEIP-->
    </div><!--END OF CONTAINER-->
</div><!--END OF SWEETS-->