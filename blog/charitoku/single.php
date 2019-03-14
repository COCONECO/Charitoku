<!DOCTYPE html>
<html>

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

get_header();
?>



    <div class="tutumi">
        <h2 class="midashi"><span>
                <?php the_title();?>
            </span>
        </h2>
        <div class="shosai">
            <p class="date"><?php echo get_the_date(); ?></p>
            <p class="category"><?php the_category();?></p>
        </div>


        <?php
/* Start the Loop */
while (have_posts()): the_post();
    the_content();
endwhile; // End of the loop.
?>
<p><?php the_tags();?></p>

        <p class="back"><a href="../../../../../../charitokuwordpress/">→記事一覧に戻る</a></p>
    </div>
    </div>
    <div class="sideBar detailSideBar">
        <?php get_sidebar();?>
    </div>

    <?php get_footer();?>
</body>

</html>