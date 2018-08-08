<?php

function returnHello(){
    return 'Hello World';
}

add_shortcode('Hello', 'returnHello');

/***********************/

function display_posts_with_content($atts,$content=NULL){

    extract(shortcode_atts(array('posts' => 1),$atts));
     
    $display ='<h2>' . $content . '</h2>';  // Content that is used in opening and closing tag
     
    $display .= '<ul>';
     
        $args = array('post_type' => 'movies',
                      'order'    => 'DESC',
                      'showposts' => $posts);
        $the_query = new WP_Query($args);
        if( $the_query->have_posts()):
            while($the_query->have_posts()) : $the_query->the_post();
            $display .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            endwhile;
        endif;
         
    $display .= '</ul>';
     
    wp_reset_query();
     
     
    return $display;
}

add_shortcode('postss','display_posts_with_content');

?>