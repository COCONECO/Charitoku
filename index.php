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
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">

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
                <li><a href="blog-list.php">
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
            <a href="#">
                <div class="arrow1">
                </div>
                <P>scroll</P>
            </a>
        </div>

    </header>

    <div class="topIMG">
        <img src="images/top/IMG_7466.JPG" class="topImg imgChange">
    </div>

    <!-- インフォメーション -->
    <!-- 新着blog記事 -->
    <div class="infoWrap">
        <div class="blogBorder">
            <div class="block blog">
                <h2 class="">新着<br>記事</h2>
            </div>
            <div class="blogInfo">
                <div class="new">
                    <img src="">
                    <div class="blogText">
                        <h3>2019/03/06</h3>
                        <p><a href="#">記事タイトル</a></p>
                    </div>
                </div>

                <div class="new">
                    <img src="">
                    <div class="blogText">

                        <h3>2019/03/06</h3>
                        <p><a href="#">記事タイトル</a></p>
                    </div>

                </div>

                <div style="text-align: right"><a href="#" class="more">→more</a></div>
            </div>
        </div>

        <div class="rssEvent">
            <div class="block eventInfo">
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
            <div style="text-align: right"><a href="#" class="more">→more</a></div>

        </div>










    </div>
    <!-- おすすめコース -->


    <div class="recommend">
        <div class="topBox block">
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
