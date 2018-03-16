<?php /* Template Name: Collaborations Template */
get_header(); ?>
<div itemprop="articleBody">
<?php

    $args = array(
    'post_type'         => 'collaborations',
    'tax_query'         => array(
        array(
            'taxonomy' => 'collaborations_categories',
			'field'    => 'slug',
			'terms'    => 'ελβετία'
        ),
    ),
    'order'             => 'ASC',
    'posts_per_page'    => -1,
);

    ?>
    <h3>Ελβετία</h3>
    <?php
    $query = new WP_Query( $args);
    while ( $query->have_posts() ) : $query->the_post();

 if (has_post_thumbnail()) {
                    the_post_thumbnail( 'medium' );
                }
?>
<?php endwhile;
      wp_reset_postdata();



    $args = array(
    'post_type'         => 'collaborations',
    'tax_query'         => array(
        array(
            'taxonomy' => 'collaborations_categories',
			'field'    => 'slug',
			'terms'    => 'ελλάδα'
        ),
    ),
    'order'             => 'ASC',
    'posts_per_page'    => -1,
);

    ?>
    <h3>Ελλάδα</h3>
    <?php
    $query = new WP_Query( $args);
    while ( $query->have_posts() ) : $query->the_post();

 if (has_post_thumbnail()) {
                    the_post_thumbnail( 'medium' );
                }
?>
<?php endwhile;
      wp_reset_postdata();
?>


</div>


<?php get_footer(); ?>
