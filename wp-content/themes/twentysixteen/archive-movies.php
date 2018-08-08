<?php
get_header();

if(have_posts()) :
    while(have_posts()) : the_post();

?>
    <a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
    <?php
    echo '<div class="entry-content">';
    the_content();
    echo get_post_meta(get_the_ID(), '_location', true);
    echo '---------------';
    echo '</div>';
    
    endwhile; 
endif;

get_footer();
?>