<?php
/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Movies', 'Post Type General Name', 'twentysixteen' ),
            'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentysixteen' ),
            'menu_name'           => __( 'Movies', 'twentysixteen' ),
            'parent_item_colon'   => __( 'Parent Movie', 'twentysixteen' ),
            'all_items'           => __( 'All Movies', 'twentysixteen' ),
            'view_item'           => __( 'View Movie', 'twentysixteen' ),
            'add_new_item'        => __( 'Add New Movie', 'twentysixteen' ),
            'add_new'             => __( 'Add New', 'twentysixteen' ),
            'edit_item'           => __( 'Edit Movie', 'twentysixteen' ),
            'update_item'         => __( 'Update Movie', 'twentysixteen' ),
            'search_items'        => __( 'Search Movie', 'twentysixteen' ),
            'not_found'           => __( 'Not Found', 'twentysixteen' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentysixteen' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'movies', 'twentysixteen' ),
            'description'         => __( 'Movie news and reviews', 'twentysixteen' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
         
        // Registering your Custom Post Type
        register_post_type( 'movies', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );


    //////////////////////////////



    function wpdocs_create_book_taxonomies() {
     
        // Add new taxonomy, NOT hierarchical (like tags)
        $labels = array(
            'name'                       => _x( 'Writers', 'taxonomy general name', 'textdomain' ),
            'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'textdomain' ),
            'search_items'               => __( 'Search Writers', 'textdomain' ),
            'popular_items'              => __( 'Popular Writers', 'textdomain' ),
            'all_items'                  => __( 'All Writers', 'textdomain' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Writer', 'textdomain' ),
            'update_item'                => __( 'Update Writer', 'textdomain' ),
            'add_new_item'               => __( 'Add New Writer', 'textdomain' ),
            'new_item_name'              => __( 'New Writer Name', 'textdomain' ),
            'separate_items_with_commas' => __( 'Separate writers with commas', 'textdomain' ),
            'add_or_remove_items'        => __( 'Add or remove writers', 'textdomain' ),
            'choose_from_most_used'      => __( 'Choose from the most used writers', 'textdomain' ),
            'not_found'                  => __( 'No writers found.', 'textdomain' ),
            'menu_name'                  => __( 'Writers', 'textdomain' ),
        );
     
        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'writer' ),
        );
     
        register_taxonomy( 'writer', 'movies', $args );
    }
    // hook into the init action and call create_book_taxonomies when it fires
    add_action( 'init', 'wpdocs_create_book_taxonomies', 0 );
?>