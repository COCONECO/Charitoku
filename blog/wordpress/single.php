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

<body>
    <header id="commonHeader">
        <div id="gnavLogo">
            <a href="http://localhost/charitoku/index.php">
                <h1>知っとく走っとく徳島サイクリングロード<div class="logoImages">
                        <div>
                </h1>
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
                <li><a href="../../../../../../../charitokuwordpress/">
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
        <p class="back"><a href="http://localhost/charitoku/blog/wordpress/">→記事一覧に戻る</a></p>
    </div>
    </div>
    <div class="sideBar detailSideBar">
        <?php get_sidebar();?>
    </div>

    <?php get_footer();?>
</body>

</html>