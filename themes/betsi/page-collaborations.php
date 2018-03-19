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
    <div class="row">
    <?php
    $query = new WP_Query( $args);
    while ( $query->have_posts() ) : $query->the_post();
?>
<div class="outer-space col-xs-12 col-sm-4">
    <div class="the-title"><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"><?php  the_title()?></a></div>
<?php
        if (has_post_thumbnail()) {
            the_post_thumbnail( 'medium' );
        }
?>
</div>
<?php endwhile;
      wp_reset_postdata();
?>
</div>
<?php



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
    <div class="row">
    <?php
    $query = new WP_Query( $args);
    while ( $query->have_posts() ) : $query->the_post();
?>
<div class="outer-space col-xs-12 col-sm-4">
    <div class="the-title"><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"><?php  the_title()?></a></div>
<?php
        if (has_post_thumbnail()) {
            the_post_thumbnail( 'medium' );
        }
?>
</div>
<?php endwhile;
      wp_reset_postdata();
?>
</div>

</div>


<?php get_footer(); ?>
