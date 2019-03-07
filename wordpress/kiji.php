<?php
/**
 * Template Name: kiji */
?>
<!DOCTYPE html>
<html>
<?php
get_header();
?>

<body>
    <header id="commonHeader">
        <div id="gnavLogo">
            <a href="http://localhost/charitoku/">
                <h1>logo<img src=""></h1>
            </a>
        </div>
        <nav id="gnav">
            <ul>
                <li><a href="http://localhost/charitoku/route-list.php?level=all">
                        <p class="navTitle">Route</p>
                        <p class="navSubTitle">ルート一覧</p>
                    </a></li>
                <li><a href="http://localhost/charitoku/introduction.php">
                        <p class="navTitle">Info</p>
                        <p class="navSubTitle">自転車の心得</p>
                    </a></li>
                <li><a href="http://localhost/charitoku/blog/wordpress/">
                        <p class="navTitle">Blog</p>
                        <p class="navSubTitle">ブログ</p>
                    </a></li>
                <li><a href="http://localhost/charitoku/link.php">
                        <p class="navTitle">Link</p>
                        <p class="navSubTitle">リンク</p>
                    </a></li>
            </ul>
        </nav>
    </header>
    <h2 class="blogListTitle">記事一覧</h2>
    <div class="main">
        <?php
        $paged = (int)get_query_var('paged');
        $args = array(
            'posts_per_page' => 10,
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
            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
            <li class="blogBox grid5Pc grid10">

                <!-- <?php the_content(); ?> -->
                <div class="blogImg"><?php the_post_thumbnail(); ?></div>
                <a href="<?php the_permalink(); ?>">
                    <h3 class="blogTitle"><?php the_title(); ?></h3>
                </a>
                <p class="blogDay"><?php echo get_the_date(); ?></p>
                <p class="blogCategory"><?php the_category(); ?></p>
                <!-- <?php the_excerpt(); ?> -->
            </li>

            <?php endwhile;
    endif; ?>
        </ul>

        <?php
        // if ($the_query->max_num_pages > 1) {
        //     echo paginate_links(array(
        //         'base' => get_pagenum_link(1) . '%_%',
        //         'format' => 'page/%#%/',
        //         'current' => max(1, $paged),
        //         'total' => $the_query->max_num_pages
        //     ));
        // }
        ?>
        <?php wp_reset_postdata(); ?>
    </div>
    </main>

    <div class="sideBar">
        <?php get_sidebar(); ?>
    </div>
    </div>
    <?php
    // if (function_exists('wp_pagenavi')) {
    //     // echo 'test';
    //     wp_pagenavi();
    // }
    ?>
</body>
<?php get_footer(); ?>

</html> 