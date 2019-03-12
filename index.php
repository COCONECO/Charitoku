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

    <!--javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>

    <script>
        //nav fixed
        jQuery(function($) {

            var nav = $('.commonHeader'),
                offset = nav.offset();

            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    nav.addClass('fixed');
                } else {
                    nav.removeClass('fixed');
                }
            });

        });

        //top slideshow
        $(function() {
            var $setElm = $('.slider'),
                fadeSpeed = 1500,
                switchDelay = 5000;

            $setElm.each(function() {
                var targetObj = $(this);
                var findUl = targetObj.find('ul');
                var findLi = targetObj.find('li');
                var findLiFirst = targetObj.find('li:first');

                findLi.css({
                    display: 'block',
                    opacity: '0',
                    zIndex: '99'
                });
                findLiFirst.css({
                    zIndex: '100'
                }).stop().animate({
                    opacity: '1'
                }, fadeSpeed);

                setInterval(function() {
                    findUl.find('li:first-child').animate({
                        opacity: '0'
                    }, fadeSpeed).next('li').css({
                        zIndex: '100'
                    }).animate({
                        opacity: '1'
                    }, fadeSpeed).end().appendTo(findUl).css({
                        zIndex: '99'
                    });
                }, switchDelay);
            });
        });

        //scroll buttun
        $(function() {
            $('a[href^="#"]').click(function() {
                var speed = 800;
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top;
                $("html, body").animate({
                    scrollTop: position
                }, speed, "swing");
                return false;
            });
        });
    </script>
</head>

<body>
    <div id="page">
        <div id="loaderBg">
            <section id="app" class="app">
                <!-- <label><div id="skipButton" class="loadStandby">Skip<input type="checkbox"></div></label> -->
                <button id="skipButton" class="loadStandby">Skip</button>
                <div id="progBar" class="progress">
                    <div class="moon loadStandby">
                        <div class="progressBar"></div>
                        <div class="progressBar"></div>
                        <div class="progressBar"></div>
                        <div class="progressBar"></div>
                    </div>
                    <div class="cloudWorld">
                        <div class="cloud">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                        <div class="cloud loadStandby">
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                            <div class="cloudChild"></div>
                        </div>
                    </div>
                    <div class="counter loadStandby"></div>
                    <div class="images loadStandby">
                        <div class="image"></div>
                        <div class="image"></div>
                        <div class="image"></div>
                        <div class="image"></div>
                        <div class="image"></div>
                        <div class="image"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="wrap">
    <header class="commonHeader">
        <div id="gnavLogo">
            <a href="index.php">
                <h1>知っとく走っとく徳島サイクリングロード<div class="logoImages">
                        <div>
                </h1>
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
                <li><a href="../charitokuwordpress/">
                        <p class="navTitle">Blog</p>
                        <p class="navSubTitle">ブログ</p>
                    </a></li>
                <li><a href="link.php">
                        <p class="navTitle">Link</p>
                        <p class="navSubTitle">リンク</p>
                    </a></li>
            </ul>
        </nav>
    </header>
    <div class="scroll">
        <a href="#main">
            <div class="arrow1">
            </div>
            <P>scroll</P>
        </a>
    </div>

    <!--top画像スライド-->
    <div class="slider topIMG">
        <ul>
            <li><img src="images/top/testtop-1.jpg" class="topImg imgChange" style="width: 1536px; height: auto; left: calc(50vw - 768px);"></li>
            <li><img src="images/top/testtop-2.jpg" class="topImg imgChange" style="width: 1536px; height: auto; left: calc(50vw - 768px);"></li>
            <li><img src="images/top/testtop-3.jpg" class="topImg imgChange" style="width: 1536px; height: auto; left: calc(50vw - 768px);"></li>
            <li><img src="images/top/testtop-4.jpg" class="topImg imgChange" style="width: 1536px; height: auto; left: calc(50vw - 768px);"></li>
        </ul>
    </div>

    <div class="tLogo"></div><!-- topロゴ -->

    <div id="main"></div>
    <!--スクロールボタンの飛び先用-->

    <!-- インフォメーション -->
    <!-- 新着blog記事 -->
    <div class="infoWrap">
        <div class="blogBorder slideLeft">
            <div class="block blog">
                <h2 class="">新着<br>記事</h2>
            </div>
            <div class="blogInfo">
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
                    $rss = simplexml_load_file('http://localhost/charitokuwordpress/feed/');
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
                <div class="new">
                    <?php echo '<img src="' . $media[$t] . '"  >'; ?>
                    <div class="blogText">


                        <?php echo '<p>' . $date[$t] . '</p>'; ?>

                        <h3>
                            <a href="<?php echo $link[$t]; ?>">
                                <?php echo $title[$t]; ?><br>
                            </a>
                        </h3>
                    </div>
                </div>

                <?php

            }
        }
        ?>

            </div>
            <a href="../charitokuwordpress/" class="more blogMore">→more</a>
        </div>

        <div class="rssEvent slideRight">
            <div class="block eventInfo ">
                <h2>イベント<br>情報</h2>
            </div>
            <div class="rss">
                <!-- RSS取得PHP -->
                <?php
 //RSSを取得するphp



                //表示記事数
                $hyojiNum = 10;
                //フィード登録
                $data['feedurl'][] = 'http://tokushima-cf.org/?feed=rss2';
                $data['feedurl'][] = 'http://www.cycling-tomorrow.jp/atom.xml';
                // $data['feedurl'][] = 'http://www.tokusupo.net/bicycle/shinchaku/index.rss';

                // ※最後に「/」は付けないでください
                //$data['feedurl'][] = 'http://www.tokusupo.net/bicycle/shinchaku/index.rss'; いくらでも追加してください
                $rssList = $data['feedurl'];
                //キャッシュ準備
                require_once('Cache/Lite.php');
                $cacheDir = 'rsscache/';
                $lifeTime = 24 * 60 * 60;
                $automaticCleaningFactor = 100;
                $options = array('cacheDir' => $cacheDir, 'caching' => true, 'lifeTime' => $lifeTime, 'automaticSerialization' => 'true', 'automaticCleaningFactor' => $automaticCleaningFactor);
                $cacheData = new Cache_Lite($options);
                $outdata =  $cacheData->get('rsscache');
                if (!$outdata) {
                    //同時呼び出し
                    $rssdataRaw = multiRequest($rssList);
                    for ($n = 0; $n < count($rssdataRaw); $n++) {
                        //URL設定
                        $rssdata = simplexml_load_string($rssdataRaw[$n]);
                        if ($rssdata->channel->item) $rssdata = $rssdata->channel;
                        if ($rssdata->item) {
                            foreach ($rssdata->item as $myEntry) {
                                $rssDate = $myEntry->pubDate;
                                if (!$rssDate) $rssDate = $myEntry->children("http://purl.org/dc/elements/1.1/")->date;
                                date_default_timezone_set('Asia/Tokyo');
                                $myDateGNU = strtotime($rssDate);
                                $myDate = date('Y/m/d', $myDateGNU);
                                $myTitle = $myEntry->title; //タイトル取得
                                $myLink = $myEntry->link; //リンクURL取得
                                //出力内容（CSSOK）
                                if (preg_match('/PR:/', $myTitle)) continue;
                                $outdata[$myDateGNU] =  '<li><a href="' . $myLink . '" target="_blank">' . $myTitle . '　</a>';
                                $outdata[$myDateGNU] .=  '<span style="margin:0px">' . $myDate . '</span></li>';
                            }
                        }
                    }
                    //ソート
                    krsort($outdata);
                    $cacheData->save($outdata, 'rsscache');
                }
                $nn = 0;
                $html = '';
                foreach ($outdata as $outdata) {
                    $nn++;
                    $html .= $outdata;
                    if ($nn == $hyojiNum) break;
                }
                $html = '<ul>' . $html . '</ul>';
                echo $html;
                //同時呼び出し関数
                function multiRequest($data, $options = array())
                {
                    // array of curl handles
                    $curly = array();
                    // data to be returned
                    $result = array();
                    // multi handle
                    $mh = curl_multi_init();
                    // loop through $data and create curl handles
                    // then add them to the multi-handle
                    foreach ($data as $id => $d) {
                        $curly[$id] = curl_init();
                        $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
                        curl_setopt($curly[$id], CURLOPT_URL,            $url);
                        curl_setopt($curly[$id], CURLOPT_HEADER,         0);
                        curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
                        // post?
                        if (is_array($d)) {
                            if (!empty($d['post'])) {
                                curl_setopt($curly[$id], CURLOPT_POST,       1);
                                curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
                            }
                        }
                        // extra options?
                        if (!empty($options)) {
                            curl_setopt_array($curly[$id], $options);
                        }
                        curl_multi_add_handle($mh, $curly[$id]);
                    }
                    // execute the handles
                    $running = null;
                    do {
                        curl_multi_exec($mh, $running);
                    } while ($running > 0);
                    // get content and remove handles
                    foreach ($curly as $id => $c) {
                        $result[$id] = curl_multi_getcontent($c);
                        curl_multi_remove_handle($mh, $c);
                    }
                    // all done
                    curl_multi_close($mh);
                    return $result;
                }
                ?>

                <!-- RSSを取得するphp終わり -->

            </div>
            <div style="text-align: right"></div>

        </div>

    </div>
    <!-- おすすめコース -->


    <div class="recommend">
        <div class="topBox block">
            <h2 class="topH2">おすすめ<br>ルート</h2>
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
            if ($row['level'] == 'beginner') {
                echo '<li class="itemBox grid5Pc grid10 fadein beginnerShadow">';
            } elseif ($row['level'] == 'standard') {
                echo '<li class="itemBox grid5Pc grid10 fadein standardShadow">';
            } elseif ($row['level'] == 'advanced') {
                echo '<li class="itemBox grid5Pc grid10 fadein advancedShadow">';
            }
            // echo '<li class="itemBox grid5Pc grid10 fadein ">';
            echo '<a href="route-details.php?course_id=' . $row['id'] . '" target="_blank">';
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
            echo '<dd>' . $row['length'] . ' km</dd>';
            echo '<dt>走行時間</dt>';
            echo '<dd>約' . $row['time'] . ' 分</dd>';
            echo '<dt>消費カロリー</dt>';
            echo '<dd>' . $row['calorie'] . ' kcal</dd>';
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
                    <!-- <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li> -->
                </ul>
                <p>©道プロジェクト</p>

            </div>
        </footer>
    </div><!-- #wrap -->

</body>

</html>
