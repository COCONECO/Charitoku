<?php

//get_header();
?>
<?php
/**
     * Template Name: kiji */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>サイクリング</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitoku/blog/wordpress/wp-content/themes/twentynineteen/kijistyle.css" type="text/css" media="all">
</head>

<body>
    <div id="contaibn">
        <h1> 記事一覧 </h1>


        <div class="main">
            <?php
            $paged = (int)get_query_var('paged');
            $args = array(
                'posts_per_page' => 10,
                'paged' => $paged,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post();
                    ?>
            <div class="post kiji">
                <a href="<?php the_permalink(); ?>">
                    <!-- <?php the_content(); ?> -->
                    <?php the_post_thumbnail(); ?>
                </a>
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>

                <div>
                    <table class="table1">
                        <tr>
                            <td>
                                <?php echo get_the_date(); ?>
                            </td>
                            <td>
                                <?php the_category(); ?>
                                <!-- <?php the_excerpt(); ?> -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endwhile;
    endif; ?>

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

        <div class="side">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <footer id="footer">
        <p>Copyright © 2018</p>
    </footer>

</body>

</html> 