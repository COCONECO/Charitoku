<?php
/**
 * Template Name: kiji */
?>
<!DOCTYPE html>
<html>
<?php
get_header();
?>

    <h2 class="blogListTitle">記事一覧</h2>
    <div class="main">
        <?php
$paged = (int) get_query_var('page');
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
            <?php
$the_query = new WP_Query($args);
if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post();
        ?>
										            <a href="<?php the_permalink();?>">
										            <li class="blogBox grid5Pc grid10">
										                            <!-- <?php the_content();?> -->
										                <div class="blogImg"><?php the_post_thumbnail();?></div>
										                <h3 class="blogTitle"><?php the_title();?></h3>
										                <p class="blogDay"><?php echo get_the_date(); ?></p>
										                <p class="blogCategory"><?php the_category();?></p>
										                <!-- <?php the_excerpt();?> -->
										            </li>
										            </a>

										        <?php
        wp_reset_postdata();
        ?>
										            <?php endwhile;
endif;?>
        </ul>


    </div>
    </main>
    <div class="sideBar">
        <?php get_sidebar();?>
    </div>
    <div  class="blogPage">
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
<?php get_footer();?>

</html>