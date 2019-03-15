<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog-list.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">
    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <header id="commonHeader">
        <div id= "gnavLogo">
            <a href="index.php"><h1>知っとく走っとく徳島サイクリングロード<div class="logoImages"><div></h1></a>
        </div>
        <nav id="gnav">
            <ul>
                <li><a href="route-list.php?level=all"><p class="navTitle">Route</p><p class="navSubTitle">ルート一覧</p></a></li>
                <li><a href="introduction.php"><p class="navTitle">Info</p><p class="navSubTitle">自転車の心得</p></a></li>
                <li><a href="blog-list.php"><p class="navTitle">Blog</p><p class="navSubTitle">ブログ</p></a></li>
                <li><a href="link.php"><p class="navTitle">Link</p><p class="navSubTitle">リンク</p></a></li>
            </ul>
        </nav>
    </header>
    <h2>記事一覧</h2>
    <main>
        <ul id="blogList">
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg" src="#">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
            <li class="blogBox grid5Pc grid10">
                <img class="blogImg">
                <h3 class="blogTitle"><a href="#">タイトル</a></h3>
                <p class="blogDay">2019/00/00</p>
                <p class="blogCategory">カテゴリ</p>
            </li>
        </ul>
    </main>
    <div class="sideBar">
        <div class="searchBar">
            <input class="searchBox" type="search" name="search" placeholder="キーワードを入力">
            <input type="submit" name="submit" value="検索">
        </div>
        <h4 class="categoryList">カテゴリ一覧</h4>
        <a href="#">コース紹介(1)</a>
        <a href="#">レビュー(1)</a>
        <a href="#">イベント(1)</a>
        <h4 class="tagList">タグ一覧</h4>
        <a href="#">海(1)</a>
        <a href="#">山(1)</a>
        <a href="#">眉山(1)</a>
    </div>
    <div class="pagenation">
        <ul>
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
    <footer>
            <div class="back">
                <ul class="sns">
                    <li><a href="https://twitter.com/CyclingRoadT?lang=ja"><i class="fab fa-twitter fa-3x"></i></a></li>
                    <li><a href="https://www.facebook.com/ProjectRoad/?modal=admin_todo_tour"><i class="fab fa-facebook fa-3x"></i></a></li>
                    <li><a href="https://www.instagram.com/projectroad03/"><i class="fab fa-instagram fa-3x"></i></a></li>
                </ul>
                <p>©道プロジェクト</p>

            </div>
        </footer>
</body>
</html>
