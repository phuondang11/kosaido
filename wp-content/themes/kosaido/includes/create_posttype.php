<?php
/*======================/Create post type - Start /=============================*/
function prefix_register_all() {
    /* column POST TYPE */
	register_post_type(
		'column',
		array(
			'labels' => array(
				'name' => __( 'コラム', 'text_domain' ),
				'singular_name' => __( 'コラム', 'text_domain' ),
				'menu_name' => __( 'コラム', 'text_domain' ),
				'name_admin_bar' => __( 'コラム', 'text_domain' ),
				'all_items' => __( '記事一覧', 'text_domain' ),
				'add_new' => _x( '新規追加', 'column', 'text_domain' ),
				'add_new_item' => __( 'Add New Item', 'text_domain' ),
				'edit_item' => __( 'Edit Item', 'text_domain' ),
				'new_item' => __( 'New Item', 'text_domain' ),
				'view_item' => __( 'View Item', 'text_domain' ),
				'search_items' => __( 'Search Items', 'text_domain' ),
				'not_found' => __( 'No items found.', 'text_domain' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'text_domain' ),
				'parent_item_colon' => __( 'Parent Items:', 'text_domain' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
                'excerpt',
				'custom-fields',
			),
            'taxonomies' => array(
			'column-category',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			'rewrite' => array(
				'slug' => 'column',
			)

		)
	);
    /* column POST TYPE  -- END */

	/* job POST TYPE */
	register_post_type(
		'job',
		array(
			'labels' => array(
				'name' => __( '新着求人', 'text_domain' ),
				'singular_name' => __( '新着求人', 'text_domain' ),
				'menu_name' => __( '新着求人', 'text_domain' ),
				'name_admin_bar' => __( '新着求人', 'text_domain' ),
				'all_items' => __( '記事一覧', 'text_domain' ),
				'add_new' => _x( '新規追加', 'job', 'text_domain' ),
				'add_new_item' => __( 'Add New Item', 'text_domain' ),
				'edit_item' => __( 'Edit Item', 'text_domain' ),
				'new_item' => __( 'New Item', 'text_domain' ),
				'view_item' => __( 'View Item', 'text_domain' ),
				'search_items' => __( 'Search Items', 'text_domain' ),
				'not_found' => __( 'No items found.', 'text_domain' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'text_domain' ),
				'parent_item_colon' => __( 'Parent Items:', 'text_domain' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array(
				'title',
				// 'editor',
				'thumbnail',
				// 'excerpt',
				'custom-fields',
			),
			'taxonomies' => array(
			'job-category',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			'rewrite' => array(
				'slug' => 'job-list',
			)

		)
	);
	/* job POST TYPE  -- END */

    /* column taxonomy */
    register_taxonomy(
		'column-cat',
		array(
			'column',
		),
		array(
			'labels'            => array(
				'name'              => _x('症例カテゴリ追加', 'column', 'text_domain'),
				'singular_name'     => _x('Category column', 'column', 'text_domain'),
				'menu_name'         => __('症例カテゴリ追加', 'text_domain'),
				'all_items'         => __('All 症例カテゴリ追加', 'text_domain'),
				'edit_item'         => __('Edit Category column', 'text_domain'),
				'view_item'         => __('View Category column', 'text_domain'),
				'update_item'       => __('Update Category column', 'text_domain'),
				'add_new_item'      => __('Add New Category column', 'text_domain'),
				'new_item_name'     => __('New Category Name column', 'text_domain'),
				'parent_item'       => __('Parent Category column', 'text_domain'),
				'parent_item_colon' => __('Parent Category column:', 'text_domain'),
				'search_items'      => __('Search 症例カテゴリ追加', 'text_domain'),
			),

			'show_admin_column' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'column-cat',
			),
		)
	);
    /* column POST TYPE  -- END */

	/* job taxonomy */
    register_taxonomy(
		'job-cat',
		array(
			'job',
		),
		array(
			'labels'            => array(
				'name'              => _x('症例カテゴリ追加', 'job', 'text_domain'),
				'singular_name'     => _x('Category job', 'job', 'text_domain'),
				'menu_name'         => __('症例カテゴリ追加', 'text_domain'),
				'all_items'         => __('All 症例カテゴリ追加', 'text_domain'),
				'edit_item'         => __('Edit Category job', 'text_domain'),
				'view_item'         => __('View Category job', 'text_domain'),
				'update_item'       => __('Update Category job', 'text_domain'),
				'add_new_item'      => __('Add New Category job', 'text_domain'),
				'new_item_name'     => __('New Category Name job', 'text_domain'),
				'parent_item'       => __('Parent Category job', 'text_domain'),
				'parent_item_colon' => __('Parent Category job:', 'text_domain'),
				'search_items'      => __('Search 症例カテゴリ追加', 'text_domain'),
			),

			'show_admin_job' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'job-cat',
			),
		)
	);
    /* job POST TYPE  -- END */

}

add_action( 'init', 'prefix_register_all', 0 );
function prefix_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'prefix_flush_rewrite_rules' );
/*======================/Create post type - end /=============================*/


/* change color for icon menu admin */
function replace_admin_menu_icons_css() {
  ?>
  <style>
    #adminmenu .menu-icon-info div.wp-menu-image:before,
    #adminmenu .menu-icon-voice div.wp-menu-image:before,
    #adminmenu .menu-icon-event div.wp-menu-image:before,
    #adminmenu .menu-icon-works div.wp-menu-image:before{

      color: #F08D39;
    }
	/* .hidden_field{display: none !important;} */
  </style>
  <?php
}
add_action( 'admin_head', 'replace_admin_menu_icons_css' );
?>