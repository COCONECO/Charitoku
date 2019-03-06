<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>知っとく走っとく徳島サイクリングロード</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/style.css" media="all">
    <link rel="stylesheet" href="css/top.css" media="all">
</head>

<body>

    <header id="commonHeader">
        <div id="gnavLogo">
            <a href="#">
                <h1>logo<img src="#"></h1>
            </a>
        </div>
        <nav id="gnav">
            <ul>
                <li><a href="route-list.php?level=all">
                        <p class="navTitle">Route</p>
                        <p class="navSubTitle">ルート一覧</p>
                    </a></li>
                <li><a href="introduction.php">
                        <p class="navTitle">Info</p>
                        <p class="navSubTitle">自転車の心得</p>
                    </a></li>
                <li><a href="http://localhost/charitoku/blog/wordpress/">
                        <p class="navTitle">Blog</p>
                        <p class="navSubTitle">ブログ</p>
                    </a></li>
                <li><a href="link.php">
                        <p class="navTitle">Link</p>
                        <p class="navSubTitle">リンク</p>
                    </a></li>
            </ul>
        </nav>
        <div class="scroll">
            <a href="">
                <div class="arrow1"></div>
                <P>scroll</P>
            </a>
        </div>
        </nav>
    </header>

    <div class="tIMG">
        <img src="images/top/IMG_7466.JPG" class="topImg imgChange"
            style="width: 1536px; height: auto; left: calc(50vw - 700px);">
    </div>

    <!-- インフォメーション -->
    <!-- 新着blog記事 -->



    <div class="test">
        <div class="textBlog">
            <div class="block coutseInfo">
                <h2>新着<br>記事</h2>
            </div>

            <div class="topBlog">
                <div id="blogList">
                <?php
echo '<div>';
?>
<?php
//何ページから表示
if (isset($_GET['page']) && $_GET['page'] > 0) {
    $page = intval($_GET['page']) - 1;
} else {
    $page = 0;
}
// echo $page;
//何ページまで表示
$count = 2;
$num = $page + $count;
echo kiji($page, $num, $count);
function kiji($page, $num, $count)
{
    $rss = simplexml_load_file('http://localhost/charitoku/blog/wordpress/feed/');
    $rss->registerXPathNamespace('', 'http://api.rakuten.co.jp/rws/rest/BooksTotalSearch/2009-04-15');
    $i = 0;
    foreach ($rss->channel->item as $item) {
        $title[$i] = $item->title;
        $date[$i] = date("Y年 n月 j日", strtotime($item->pubDate));
        $link[$i] = $item->link;
        $description[$i] = mb_strimwidth(strip_tags($item->description), 0, 110, "…Read More", "utf-8");
        $media[$i] = $item->media;
        $i++;
    }
    $maxpage = $i;
    $cnt = $count;
    // echo $maxpage;
    if ($i > $num) {
        $i = $num;
    }
    $t = $page;
    for ($t; $t < $i; $t++) {
        ?>
    <div class="profile_card">
        <div class="card_photo">
            <?php echo '<div class="card_photo_img"><img src="' . $media[$t] . '"  class="boxbox"></div>'; ?>
        </div>
        <div class="profile_bio">
        <?php echo '<h3>' . $date[$t] . '</h3>'; ?>
        <br>
        <p>
        <a href="<?php echo $link[$t]; ?>" target="_blank">
            <?php echo $title[$t]; ?><br>
        </a>
        </p>
        </div>
    </div>

<?php
}
}
echo '</div> '
?>


                </div>
            </div>
            <div style="text-align: right"><a href="http://localhost/charitoku/blog/wordpress/" class="more">→more</a></div>
        </div>


        <div class="text">
            <div class="block">
                <h2>イベント<br>情報</h2>
            </div>
            <div class="rss">
                <ul>
                    <li>「渡船(約5分)で行く早春の鳴門満喫観光ライド」開催のお知らせ（2019年2月14日</li>
                    <li>日本でいちばん楽しい自転車教室がやってくる！ウィーラースクール開催のお知らせ（2019年2月1日）</li>
                    <li>「TOKUSHIMAサイクルフェスタvol.2」開催のお知らせ（2019年1月29日)</li>
                    <li>『TOKUSHIMAサイクルフェスタ ランニングバイクレース』開催のお知らせ（2019年1月28日）</li>
                    <li>２月のミニガイド開催のお知らせ（2019年1月23日）</li>
                    <li>１月のミニガイドツーリング開催のお知らせ（2018年12月14日）</li>
                    <li>健康サイクリング部の実施について（2018年12月10日）</li>
                    <li>１１月のミニガイドツーリング開催のお知らせ（2018年10月22日）</li>
                    <li>１０月のミニガイドツーリング開催のお知らせ（2018年10月5日）</li>
                    <li>「サイクルトレイン阿波池田」開催のお知らせ（2018年9月19日）</li>
                </ul>
            </div>
            <!-- <div style="text-align: right"><a href="#" class="more">→more</a></div> -->
        </div>
    </div>


    <!-- おすすめコース -->




    <div>
        <div class="topBox">
            <h2 class="topH2">おすすめ<br>コース</h2>
        </div>
    </div>

    <div class="topCourse">
    <?php

//DB接続
$dsn = 'mysql:host=localhost;dbname=charitoku;charset=utf8';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("select * from course where del_flag=0 order by popularity desc limit 4; ");
    // $stmt->bindParam(':level', $level, PDO::PARAM_STR);
    $stmt->execute();
    $data = array();
    $count = $stmt->rowCount();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    // echo 'hello';
} catch (PDOException $e) {
    // echo 'bad';
    die('エラー:' . $e->getMesssage());
}
echo '<ul id="itemList">';
foreach ($data as $row) {

    echo '<li class="itemBox grid5Pc grid10">';
    echo '<a href="#">';
    echo '<img class="mainImg" src="./images/route/' . $row['picture_filename'] . '" alt="">';
    $id = intval($row['id']);
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("select * from course_route where course_id  = $id  limit 3");
        // $stmt->bindParam(':level', $level, PDO::PARAM_STR);
        $stmt->execute();
        $data3 = array();
        $count = $stmt->rowCount();
        while ($row3 = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data3[] = $row3;
        }
        // echo 'hello';
    } catch (PDOException $e) {
        // echo 'bad';
        die('エラー:' . $e->getMesssage());
    }
    foreach ($data3 as $row3) {

        echo '<img class="subImg" src="./images/route/' . $row3['picture_filename'] . '" alt="">';
    }
    // echo '<img class="subImg">';
    // echo '<img class="subImg">';
    echo '<div class="left">';
    echo '<h3 class="routeTitle">' . $row['title'] . '</h3>';
    echo '<p class="description">' . $row['sub_description'] . '</p>';
    echo '<dl>';
    echo '<dt>走行距離</dt>';
    echo '<dd>' . $row['length'] . 'km</dd>';
    echo '<dt>走行時間</dt>';
    echo '<dd>約' . $row['time'] . '時間</dd>';
    echo '<dt>消費カロリー</dt>';
    echo '<dd>' . $row['calorie'] . 'kcal</dd>';
    echo '</dl>';
    echo '</div>';
    echo '<div class="right">';
    if ($row['level'] == 'beginner') {
        echo '<div class="level beginner">初級</div>';
    } elseif ($row['level'] == 'standard') {
        echo '<div class="level standard">中級</div>';
    } elseif ($row['level'] == 'advanced') {
        echo '<div class="level advanced">上級</div>';
    }
    echo '<p class="detail"><a href="route-details.php?course_id=' . $row['id'] . '" target="_blank">詳細へ</a></p>';
    echo '</div>';
    echo '</a>';
    echo '</li>';
}
echo '</ul>';

?>


    <div><a href="http://localhost/charitoku/route-list.php?level=all" class="more routemore">→more</a></div>

    <footer>
        <div class="back">
            <ul class="banner">
                <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li>
            </ul>
        </div>
    </footer>


</body>

</html>
