<?php
    if(!get_query_var( 'taxonomy' ) and !get_query_var( 'term' )) {
        $taxonomy = 'recipes_cat';
        $term = 'all-recipes';
    }else{
	    $taxonomy = get_query_var( 'taxonomy' );
	    $term = get_query_var( 'term' );
    }
?>
<div class="sweets">
    <div class="container">
        <div class="banner_share">
            <ul class="social">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <!--<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>-->
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div><!--END OF BANNER SHARE-->
    </div><!--END OF CONTAINER-->

    <div class="container">
        <div class="recipe sweet">
            <div class="sort">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h2>
                            <?php
                                $category = get_term_by( 'slug', $term, $taxonomy ); ;
                                echo $category->name;
                                // var_dump($category);
                            ?>
                        </h2>
                        <input type="text" class="form-control" placeholder="Search...Chocolate, Peanutbutter...">
                    </div><!--END OF COL MD 4-->
                    <div class="col-md-4 col-12">
                        <a href="javascript:void(0)" class="btn video" style="display: inline-block;">RECIPIES </a>
                        <a href="javascript:void(0)" class="btn video" style="display: inline-block;">VIDEOS </a>

                    </div><!--END OF COL MD 4-->

                </div>
            </div><!---END OF SORT-->
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        
                        
                        <?php
	
	
	                        $recipes_posts = get_posts(
		                        array(
			                        'posts_per_page' => -1,
			                        'post_type' => 'recipes',
			                        'tax_query' => array(
				                        array(
					                        'taxonomy' => 'recipes_cat',
					                        'field' => 'term_id',
					                        'terms' => $category->term_id,
				                        )
			                        )
		                        )
	                        );
	                        
	                        // var_dump($recipes_posts);
	                        
	                        
                        ?>
                        
                        
                        <?php if(count($recipes_posts) > 0): ?>
                            <?php foreach ($recipes_posts as $rpost): ?>
                                <div class="col-4">
                                    <div class="thumbnail_box">
                                        <div class="inner">
                                            <img src="<?php echo get_the_post_thumbnail_url( $rpost->ID ); ?>" alt="" class="img-fluid">
                                            <div class="mask">
                                                <a href="<?php echo get_the_permalink($rpost->ID) ?>" target="1" class="btn big">View Recipe</a>
                                                <p>Portion: <?php echo get_post_meta( $rpost->ID, 'recipes_additional_info_servings')[0]; ?>   |   Time: <?php echo get_post_meta( $rpost->ID, 'recipes_additional_info_cook_time')[0]; ?></p>
                                            </div><!--END OF MASK-->
                                        </div><!--END OF inner-->
                                        <h3><?php echo get_the_title($rpost->ID); ?></h3>
                                        <p><?php echo get_the_excerpt($rpost->ID); ?></p>
                                    </div><!--END OF THUMBNAIL BOX-->
                                </div><!--END OF COL-6-->
                                <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-4">
                                <?php echo _e('No recipes found.') ?>
                            </div><!--END OF COL-6-->
                        <?php endif; ?>
                        
                    </div><!--END OF ROW-->
                </div><!--END OF COL MD 9-->

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

                    </div><!--END OF ROW-->
                </div>

            </div><!--END OF COL MD 6-->
        </div><!--END OF ROW-->

    </div><!--END OF RECEIP-->
</div><!--END OF CONTAINER-->
</div><!--END OF SWEETS-->

<div class="container">
    <div class="pagi">
        <ul class="list-unstyled">
            <li><span>More <?php echo $category->name; ?></span></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><img src="images/arrow.png" alt=""></a></li>
        </ul>
    </div>
</div>