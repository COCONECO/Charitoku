<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<h1 class="blogListTitle"><?php the_archive_title('<div class="page-title">', '</div>'); ?></h1>
<div class="main">
    <?php
    $paged = (int)get_query_var('page');
    $args = array(
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
    );
    ?>
    <ul id="blogList">
        <?php if (have_posts()) : ?>


        <?php
 // Start the Loop.
        while (have_posts()) :
            the_post();
            ?>
        <a href="<?php the_permalink(); ?>">
            <li class="blogBox grid5Pc grid10">
                <!-- <?php the_content(); ?> -->
                <div class="blogImg"><?php the_post_thumbnail(); ?></div>
                <h3 class="blogTitle"><?php the_title(); ?></h3>
                <p class="blogDay"><?php echo get_the_date(); ?></p>
                <p class="blogCategory"><?php the_category(); ?></p>
                <!-- <?php the_excerpt(); ?> -->
            </li>
        </a>


        <?php
        wp_reset_postdata();
        ?>

        <?php endwhile; ?>

        <?php
    else :
        get_template_part('template-parts/content/content', 'none');

    endif;
    ?>

</div>
</main>
<div class="sideBar">
    <?php get_sidebar(); ?>
</div>
<div class="blogPage">
    <?php
    if ($the_query->max_num_pages > 1) {
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%/',
            'current' => max(1, $paged),
            'total' => $the_query->max_num_pages,
        ));
    }
    ?>
</div>
</div>


</body>
<?php get_footer(); ?>

</html> 