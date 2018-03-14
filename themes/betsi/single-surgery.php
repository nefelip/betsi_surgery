<?php
/**
 * The Template for displaying all surgery posts.
 *
 * @package _tk
 */

get_header(); ?>
<div itemprop="articleBody">
       <?php

    $args = array(
    'post_type'=> 'surgery',
    'order'    => 'ASC'
    );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) : $query->the_post();
        ?>
        <?php the_content();?>
<?php endwhile;
      wp_reset_postdata();
?>


</div>

<?php if ( ! dynamic_sidebar( 'side-contact' ) ) : ?>
	<?php dynamic_sidebar( 'side-contact' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
