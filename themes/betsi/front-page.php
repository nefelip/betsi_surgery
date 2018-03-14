<?php
/**
 * Front page
 */

get_header(); ?>
<div itemprop="articleBody">
       <?php
        $query = new WP_Query( 'pagename=βιογραφικό' );
        while ( $query->have_posts() ) : $query->the_post();
        ?>
        <?php the_content();?>
<?php endwhile;
      wp_reset_postdata();
?>


</div>


<?php get_footer(); ?>
