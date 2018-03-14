<?php
/**
 * The Template for displaying all surgery posts.
 *
 * @package _tk
 */

get_header(); ?>
<div itemprop="articleBody">

<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
</div>


<?php get_footer(); ?>
