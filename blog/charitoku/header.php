<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>記事一覧</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">
    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- stylesheets -->
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitokuwordpress/wp-content/themes/charitoku/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitokuwordpress/wp-content/themes/charitoku/style.scss" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitokuwordpress/wp-content/themes/charitoku/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitokuwordpress/wp-content/themes/charitoku/css/blog-list.css" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitokuwordpress/wp-content/themes/charitoku/css/blog-details.css" type="text/css" media="all">
    <!-- <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitoku/blog/wordpress/wp-content/themes/twentynineteen/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitoku/blog/wordpress/wp-content/themes/twentynineteen/css/blog-list.css" type="text/css" media="all">
    <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitoku/blog/wordpress/wp-content/themes/twentynineteen/css/blog-details.css" type="text/css" media="all"> -->

    <!-- <link rel="stylesheet" id="dashicons-css" href="http://localhost/charitoku/blog/wordpress/wp-content/themes/twentynineteen/kijistyle.css" type="text/css" media="all"> -->

</head>

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