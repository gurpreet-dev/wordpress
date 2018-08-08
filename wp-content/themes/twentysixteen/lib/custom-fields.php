<?php

function add_custom_meta_box()
{
                // $ID              $ title             $callback            $post_type
    add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "movies", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");


function custom_meta_box_markup()
{
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '">';     // Get the location data if its already been entered
     
     
                            // post ID      name    $single
    $location = get_post_meta($post->ID, '_location', true); // Will be value of meta data field if $single is true
     
     
    // Echo out the field
    echo '
 
Enter the location:
 
';
    echo '<input type="text" name="_location" value="' . $location . '" class="widefat">';     
}

// Save the Metabox Data
function gp_save_events_meta($post_id, $post) {
         
    $events_meta['_location'] = $_POST['_location'];
     
    // Add values of $events_meta as custom fields
    foreach ($events_meta as $key => $value){ // Cycle through the $events_meta array!
     
        if( $post->post_type == 'revision' ) return;      // Don't store custom data twice
            $value = implode(',', (array)$value);       // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) {   // If the custom field already has a value.
            update_post_meta($post->ID, $key, $value);
        }else{ // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
     
    }
}
add_action('save_post', 'gp_save_events_meta', 1, 2); // save the custom fields


?>