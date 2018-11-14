
<div class="clearfix"></div>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/logo.png" alt="" class="img-fluid">
			
			</div><!--END OF COL MD 4-->
			
			<div class="col-md-3">
				<h4>About Snack Society</h4>
				<p>Here, we not only deliver some of the most delicious, “free-from” and healthy treats, but we also share some of our best recipes so you can make them yourself. Either way, you can ditch the 3pm vending machine habit.</p>
				<ul class="social">
					<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<!-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div><!--END OF COL MD 3-->
			
			<div class="col-md-3 links">
				<h4>Site Map</h4>
				<ul class="list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li><a href="story.html">My Story</a></li>
					<li><a href="sweets.html">Our Recipes</a></li>
					<li><a href="news.html">Latest News</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="index.html#social">Social Society</a></li>
					<li><a href="product.html">Shop</a></li>
					<li><a href="terms_conditions.html">Terms & Conditions</a></li>
					<li><a href="privacy-policy.html">Privacy Policy</a></li>
				</ul>
			</div><!--END OF COL MD 2-->
			
			<div class="col-md-3">
				<h4>Contact Us</h4>
				<h5><span>Office 123, Dubai Marina</span>
					<span>W: www.snacksociety.ae</span>
				</h5>
				<p><a href="#">hello@snacksociety.com</a></p>
				<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/cards-150x150.png" class="img-fluid">
			</div><!--END OF COL MD 3-->
		
		</div><!--END OF ROW-->
		<div class="text-center pt-4 pb-0"><p class="">2018 Copyright The Snack Society. All rights reserved.</p></div>
	</div><!--END OF CONTAINER-->
</div><!--END OF FOOTER-->

<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/swiper.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/script.js"></script>
<script>

    jQuery(function(){
        jQuery('.thumbnail_box .big').click(function(){
            jQuery('.big_img').hide(500);
            jQuery('#div'+$(this).attr('target')).show(500);
        });
    });
</script>

<script>
    $(window).load(function() {
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<?php wp_footer(); ?>

</body>
</html>