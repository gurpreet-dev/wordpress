<?php

/**
 * Plugin Name: Custom Plugin
 * Plugin URI: http://code.gurpreetsingh.in/
 * Description: Description of plugin
 * Version: 1.0.0
 * Author: Gurpreet singh
 * Author URI: http://code.gurpreetsingh.in/
 * License: GPL2
 */

function gp_register_your_custom_menu_page(){
    add_menu_page('Gurpreet singh', 'Gurpreet singh', 'manage_options', 'gurpreet-singh', 'gp_function');
}

add_action( 'admin_menu', 'gp_register_your_custom_menu_page' );

function gp_function(){
    ?>

    <button type="button" id="btn1">Click here</button>
    <button type="button" id="btn2">Get Movies (Post type)</button>

    <div id="all_movies">
        
    </div>

    <?php
}

/************************/

function your_namespace() {
    // wp_register_style('your_namespace', plugins_url('style.css',__FILE__ ));
    // wp_enqueue_style('your_namespace');
    wp_register_script( 'your_namespace', plugins_url('/js/custom.js',__FILE__ ));
    wp_localize_script( 'your_namespace', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
    wp_enqueue_script('your_namespace');
}

add_action( 'admin_init','your_namespace');

/************************/

add_action("wp_ajax_get_posts", "get_all_posts");
add_action("wp_ajax_nopriv_get_posts", "get_all_posts");

function get_all_posts() {

    $args = array(
        'numberposts' => 10,
        'post_type'   => 'movies'
    );
    
    $movies = get_posts( $args );

    $html = '<ul>';

    foreach($movies as $movie){
        setup_postdata( $movie );
        $html .= '<li><a href="'.get_permalink($movie->ID).'" target="_blank">'.$movie->post_title.'</a></li>';
    }

    $html .= '</ul>';

    echo $html;

    wp_die();
}

?>