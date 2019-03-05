<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

//get_header();
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
    <h1 class="title">
        <?php the_title(); ?>
    </h1>

    <div class="contain">
        <section id="primary" class="content-area">
            <main id="main" class="site-main main">
                <?php

                /* Start the Loop */
                while (have_posts()): the_post();
                    the_content();

                // get_template_part('template-parts/content/content', 'single');

                // if (is_singular('attachment')) {
                //     // Parent post navigation.
                //     the_post_navigation(
                //         array(
                //             /* translators: %s: parent post link */
                //             'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen'), '%title'),
                //         )
                //     );
                // } elseif (is_singular('post')) {
                //     // Previous/next post navigation.
                //     the_post_navigation(
                //         array(
                //             'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next Post', 'twentynineteen') . '</span> ' .
                //                 '<span class="screen-reader-text">' . __('Next post:', 'twentynineteen') . '</span> <br/>' .
                //                 '<span class="post-title">%title</span>',
                //             'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous Post', 'twentynineteen') . '</span> ' .
                //                 '<span class="screen-reader-text">' . __('Previous post:', 'twentynineteen') . '</span> <br/>' .
                //                 '<span class="post-title">%title</span>',
                //         )
                //     );
                // }

                // If comments are open or we have at least one comment, load up the comment template.
                // if (comments_open() || get_comments_number()) {
                //     comments_template();
                // }

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
            <div class="side">
                <?php get_sidebar(); ?>
            </div>

        </section><!-- #primary -->
    </div>
    <footer id="footer">
        <p>Copyright © 2018</p>
    </footer>

</body>

</html> 