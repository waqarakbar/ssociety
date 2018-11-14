<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/swiper.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	
	<?php wp_head();?>

    <style type="text/css">
        .header #flexmenu ul li a{
            padding: 10px 12px 13px !important;
        }
    </style>
    
</head>

<body>
<div class="se-pre-con"></div>
<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<a href="#" title="Snack Society" class="logo"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Snack Society" class="img-fluid"></a>
			</div><!--END OF COL MD 2-->
			
			<div class="col-md-8">
				<?php clean_custom_menu('primary'); ?>
			</div><!--END OF COL MD 8-->
			
			<div class="col-md-2">
				<div class="action_area">
					<div class="cart">
						<a href="product.html" class="btn">Shop</a>
						<a href="cart.html"><span>Cart</span> <strong>1</strong></a>
					
					</div><!--END OF CART-->
				</div><!--END OF ACTION AREA-->
			
			</div><!--END OF COL MD 2-->
		</div><!--END OF ROW-->
	</div><!--END OF CONTAINER-->
</div><!--END OF HEADER-->
<div class="clearfix"></div>