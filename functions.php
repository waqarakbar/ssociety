<?php
	
	// include "example-functions.php";

	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
	
	
	/**
	 * register primary and secondary menu locations
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'your_theme_name' ),
		'secondary' => __('Secondary Navigation', 'your_theme_name')
	) );
	
	/**
	 * markup of primary menu
	 * @param $theme_location
	 */
	function clean_custom_menu( $theme_location ) {
		if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
			$menu = get_term( $locations[$theme_location], 'nav_menu' );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			
			$menu_list  = '<nav id="flexmenu">' ."\n";
			$menu_list .= '<div id="mobile-toggle" class="button"></div>'."\n";
			$menu_list .= '<ul class="main-menu">' ."\n";
			
			$count = 0;
			$submenu = false;
			
			foreach( $menu_items as $menu_item ) {
				
				$link = $menu_item->url;
				$title = $menu_item->title;
				
				if ( !$menu_item->menu_item_parent ) {
					$parent_id = $menu_item->ID;
					
					$menu_list .= '<li class="item">' ."\n";
					$menu_list .= '<a href="'.$link.'" >'.$title.'</a>' ."\n";
				}
				
				if ( $parent_id == $menu_item->menu_item_parent ) {
					
					if ( !$submenu ) {
						$submenu = true;
						$menu_list .= '<ul>' ."\n";
					}
					
					$menu_list .= '<li>' ."\n";
					$menu_list .= '<a href="'.$link.'">'.$title.'</a>' ."\n";
					$menu_list .= '</li>' ."\n";
					
					
					if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
						$menu_list .= '</ul>' ."\n";
						$submenu = false;
					}
					
				}
				
				if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) {
					$menu_list .= '</li>' ."\n";
					$submenu = false;
				}
				
				$count++;
			}
			
			$menu_list .= '</ul>' ."\n";
			$menu_list .= '</nav>' ."\n";
			
		} else {
			$menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
		}
		echo $menu_list;
	}
	
	
	/**
	 * Registers the event post type.
	 */
	function recipe_cpt() {
		$labels = array(
			'name'               => __( 'Recipes' ),
			'singular_name'      => __( 'Recipe' ),
			'add_new'            => __( 'Add New Recipe' ),
			'add_new_item'       => __( 'Add New Recipe' ),
			'edit_item'          => __( 'Edit Recipe' ),
			'new_item'           => __( 'Add New Recipe' ),
			'view_item'          => __( 'View Recipe' ),
			'search_items'       => __( 'Search Recipe' ),
			'not_found'          => __( 'No recipe found' ),
			'not_found_in_trash' => __( 'No recipe found in trash' )
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'comments',
			'revisions',
			'excerpt'
		);
		$args = array(
			'labels'               => $labels,
			'supports'             => $supports,
			'public'               => true,
			'hierarchical'         => true,
			'capability_type'      => 'post',
			'rewrite'              => array( 'slug' => 'recipes' ),
			'taxonomies'           => array( 'recipes_cat' ),
			'has_archive'          => true,
			'menu_position'        => 30,
			'menu_icon'            => 'dashicons-carrot'
		);
		register_post_type( 'recipes', $args );
	}
	add_action( 'init', 'recipe_cpt' );
	
	add_action( 'init', 'recipes_taxonomy');
	function recipes_taxonomy() {
		register_taxonomy(
			'recipes_cat',  //The name of the taxonomy.
			'recipes',  //post type name
			array(
				'public'                => true,
				'hierarchical'          => true,
				'label'                 => 'Recipes Category',  //Display name
				'query_var'             => true,
				'show_admin_column'     => true,
				'rewrite'               => array(
					'slug'              => 'recipes_cat', // This controls the base slug that will display before each term
					'with_front'        => false // Don't display the category base before
				)
			)
		);
	}
	
	
	
	
	
	add_action( 'cmb2_admin_init', 'recipe_ingredients' );
	/**
	 * Hook in and add a metabox to demonstrate repeatable grouped fields
	 */
	function recipe_ingredients() {
		$prefix = 'recipe_ingredients_group_';
		
		/**
		 * Repeatable Field Groups
		 */
		$cmb_group = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Recipe Ingredients', 'cmb2' ),
			'object_types' => array( 'recipes' ),
		) );
		
		// $group_field_id is the field id string, so in this case: $prefix . 'demo'
		$group_field_id = $cmb_group->add_field( array(
			'id'          => $prefix . 'demo',
			'type'        => 'group',
			// 'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Ingredient {#}', 'cmb2' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Ingredient', 'cmb2' ),
				'remove_button' => esc_html__( 'Remove Ingredient', 'cmb2' ),
				'sortable'      => true,
				// 'closed'     => true, // true to have the groups closed by default
			),
		) );
		
		/**
		 * Group fields works the same, except ids only need
		 * to be unique to the group. Prefix is not needed.
		 *
		 * The parent field's id needs to be passed as the first argument.
		 */
		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Ingredient + Quantity', 'cmb2' ),
			'id'         => 'title',
			'type'       => 'text',
			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		
	}
	
	
	
	add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
	/**
	 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
	 */
	function yourprefix_register_demo_metabox() {
		$prefix = 'recipes_additional_info_';
		
		/**
		 * Sample metabox to demonstrate each field type included
		 */
		$cmb_demo = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => esc_html__( 'Recipe Additional Information', 'cmb2' ),
			'object_types'  => array( 'recipes' )
		) );
		
		$cmb_demo->add_field( array(
			'name'       => esc_html__( 'Prep Time', 'cmb2' ),
			'desc'       => esc_html__( 'Preparation time', 'cmb2' ),
			'id'         => $prefix . 'prep_time',
			'type'       => 'text',
			'show_on_cb' => 'yourprefix_hide_if_no_cats',
		) );
		
		$cmb_demo->add_field( array(
			'name'       => esc_html__( 'Cook Time', 'cmb2' ),
			'desc'       => esc_html__( 'Cooking time', 'cmb2' ),
			'id'         => $prefix . 'cook_time',
			'type'       => 'text',
			'show_on_cb' => 'yourprefix_hide_if_no_cats',
		) );
		
		
		$cmb_demo->add_field( array(
			'name'       => esc_html__( 'Servings', 'cmb2' ),
			'desc'       => esc_html__( 'Total servings of this recipe', 'cmb2' ),
			'id'         => $prefix . 'servings',
			'type'       => 'text',
			'show_on_cb' => 'yourprefix_hide_if_no_cats',
		) );
		
		
		$cmb_demo->add_field( array(
			'name' => esc_html__( 'Youtube Video Link', 'cmb2' ),
			'desc' => esc_html__( 'Copy and past youtube link (if exists)', 'cmb2' ),
			'id'   => $prefix . 'youtube_video_link',
			'type' => 'text_url',
			// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
			// 'repeatable' => true,
		) );
		
		$cmb_demo->add_field( array(
			'name' => esc_html__( 'Method', 'cmb2' ),
			'desc' => esc_html__( 'Recipe method', 'cmb2' ),
			'id'   => $prefix . 'method',
			'type' => 'textarea',
		) );
		
		$cmb_demo->add_field( array(
			'name' => esc_html__( 'Tip', 'cmb2' ),
			'desc' => esc_html__( 'Tip for this recipe', 'cmb2' ),
			'id'   => $prefix . 'tips',
			'type' => 'textarea',
		) );
		
	}
	
	
	
	
	
	// add_action( 'cmb2_admin_init', 'news_date_field' );
	/**
	 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
	 */
	/*function news_date_field() {
		$prefix = 'new_date_';
		
		$cmb_demo = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => esc_html__( 'News Additional Info', 'cmb2' ),
			'object_types'  => array( 'post' )
		) );
		
		$cmb_demo->add_field( array(
			'name'       => esc_html__( 'Date', 'cmb2' ),
			'desc'       => esc_html__( 'News Date', 'cmb2' ),
			'id'         => $prefix . 'news_date',
			'type'       => 'text',
			'show_on_cb' => 'yourprefix_hide_if_no_cats',
		) );
		
	}*/