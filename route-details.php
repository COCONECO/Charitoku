<!DOCTYPE html>
<html>

<?php
$course_id = $_GET['course_id'];
// echo $course_id;

$dsn = 'mysql:host=localhost;dbname=charitoku;charset=utf8';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("select order_number,b.course_id,a.title,a.description,b.description bdescription,b.sub_description bsub_description, a.level,a.popularity,a.length,a.time,a.calorie,a.start_lat,a.start_long,a.goal_lat,a.goal_long,b.picture_title,b.picture_filename,b.wait_lat,b.wait_long,b.description detaildescription,genre_id,b.route_flag,b.url from course a, course_route b where a.id=b.course_id and b.course_id=:course_id order by order_number");
    //select b.course_id,a.title,a.description,a.level,a.popularity,a.length,a.time,a.calorie,a.start_lat,a.start_long,a.goal_lat,a.goal_long,a.picture_title,a.picture_filename from course a, course_route b where a.id=b.course_id and id=1;
    $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
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
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("select * from course where id=:course_id");
    //$stmt = $db->prepare("select * from course_route where cource_id=$cource_id");
    $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    $stmt->execute();
    $data2 = array();
    $count = $stmt->rowCount();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data2[] = $row;
    }
} catch (PDOException $e) {
    die('エラー:' . $e->getMesssage());
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>ページ詳細サンプル</title> -->
    <?php
    foreach ($data2 as $row) {
        echo '<title>' . $row['title'] . '</title>';
    }
    ?>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <script src="http://maps.google.com/maps/api/js?v=3&sensor=false&key=AIzaSyBr21j2fw7PjrfdQyGU_4WFLZNqWWACmMo" type="text/javascript" charset="UTF-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="./css/route-details.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">
    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

</head>

<body>
    <header id="commonHeader">
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
                <li><a href="../charitokuwordpress">
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
    <div id="imagesCover">
        <section class="imagesCover">
            <!-- <img class="headerImages" src="./images/route-details/testtop-2.jpg" alt="コース詳細サンプル画像"> -->

            <?php
            foreach ($data2 as $row) {
                echo '<img class="headerImages" src="./images/route/details-' . $row['picture_filename'] . '" alt="' . $row['picture_title'] . '">';
            }
            ?>
        </section>
    </div><!-- /#imagesCover -->
    <section id="main" class="container">
        <section class="courseContents">
            <!-- <h2>眉山クライミング<br class="sp">（庄町→八万）（仮）</h2> -->

            <?php
            foreach ($data2 as $row) {
                echo '<h2 class="courseName">' . $row['title'] . '</h2>';
            }
            ?>

            <section class="courseDescription">
                <?php
                foreach ($data2 as $row) {
                    echo '<p class="courseText">' . $row['description'] . '</p>';
                    echo '<p class="courseText">' . $row['sub_description'] . '</p>';
                }
                ?>
                <!-- <p>眉山の庄町側から登っていくコースです。<br>
                    庄町側からは八万側からに比べると登りの走行距離は長いですがその分坂道が緩やかになっているので<br>
                    山を自転車で登るのが初めての方にお勧めです。<br>
                    眉山公園から一望できる徳島全体を見渡せる景色は眉山を登り切ったという達成感を味わえます。<br>
                    春や秋になると途中にある西部公園やコース沿いに桜や紅葉といった景色を楽しみながら走ることができます。<br>
                </p> /.courseText -->
                <table class="dateTable">
                    <tr>
                        <th>走行距離</th>
                        <!-- <td>8km</td> -->
                        <?php
                        foreach ($data2 as $row) {
                            echo '<td>' . $row['length'] . 'km</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>走行時間</th>
                        <!-- <td>約50分</td> -->
                        <?php
                        foreach ($data2 as $row) {
                            echo '<td>約' . $row['time'] . '分</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>消費カロリー</th>
                        <!-- <td>約1000kcal</td> -->
                        <?php
                        foreach ($data2 as $row) {
                            echo '<td>約' . $row['calorie'] . 'kcal</td>';
                        }
                        ?>
                    </tr>
                </table><!-- /.dateTable -->
                <div id="map" class="map">
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3241.177172339873!2d139.72505595!3d35.672639249999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5p2x5Lqs6YO95riv5Yy66Z2S5bGxMS0x!5e0!3m2!1sja!2sjp!4v1439816808418"
                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </div><!-- /.map -->

                <div class="slope">
                    <canvas id="chart" height="70%"></canvas>
                    <!-- <iframe></iframe> -->

                    <table class="dateTable">
                        <tr>
                            <th class="start">0km</th>
                            <!-- <td class="goal">--km</td> -->
                            <?php
                            foreach ($data2 as $row) {
                                echo '<td>' . $row['length'] . 'km</td>';
                            }
                            ?>

                        </tr>
                    </table>
                </div><!-- /.slope -->
                <div class="arrivalBar">
                    <table class="arrivalRate">
                        <input type="range" class="bar" value="50" min="0" max="100" data-unit="%" name="arrivalRate">
                        <p class="barDescription">バーを動かして、<br class="sp">位置の確認ができます</p>
                    </table>
                </div><!-- /.arrivalBar -->
            </section><!-- /.courseDescription -->
        </section><!-- /.courseContents -->


        <?php
        $idx = 1;
        foreach ($data as $row) {

            echo '<div class="wrap">';
            echo '<h3>' . $idx . '. ' . $row['picture_title'] . '</h3>';
            echo '<div class="wrapFlex">';
            // echo '<img src="./images/route/' . $row['picture_filename'] . '" height="165" width="165" alt="' . $row['picture_title'] . '">';

            // 分岐
            $imageFilePath = './images/route/' . $row["picture_filename"]  ;

            if (file_exists($imageFilePath)) {
                echo '<img src="./images/route/' . $row['picture_filename'] . '" height="165" width="165" alt="' . $row['picture_title'] . '">';
            }else{
                echo '<img src="./images/route/noimage.png" height="165" width="165" alt="no image">';
            }



            echo '<p class="text">' . $row['detaildescription'] . '<br><br>' . $row['bsub_description'] . '</p>';
            echo '</div></div>';
            $idx++;
        }
        ?>

        <!-- <div class="wrap">
            <h3>1</h3>
            <div class="wrapFlex">
                <img src="./images/route-details/test-1.jpg" height="165" width="165" alt="コース詳細画像">
                <p class="text">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                    ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
            </div>
        </div> -->

        <div class="tweet">
            <a href="./route-list.php?level=all">ルート一覧に戻る</a>
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-text="<?php echo $row['title'] ?>をサイクリングしました！">
                Tweet</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div><!-- /.tweet -->
    </section><!-- /#main -->
    <footer>
            <div class="back"></div>
                <ul class="sns">
                    <li><a href="#"><i class="fab fa-twitter fa-3x"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook fa-3x"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
                </ul>
                <p>©道プロジェクト</p>

            
    </footer>
    <script>
        // 経由地点を設定
        var latlang = [
            <?php
            $count = count($data);
            $i = 0;
            foreach ($data as $row) {
                $i++;
                echo '{';
                echo 'order_number:' . $row['order_number'] . ',';
                echo 'description:"' . $row['detaildescription'] . '",';
                echo 'sub_description:"' . $row['bsub_description'] . '",';
                echo 'picture:"' . $row['picture_filename'] . '",';
                echo 'genre_id:"' . $row['genre_id'] . '",';
                echo 'route_flag:' . $row['route_flag'] . ',';
                echo 'url:"' . $row['url'] . '",';
                echo 'lat:"' . $row['wait_lat'] . '",';
                echo 'lang:"' . $row['wait_long'] . '"';
                if ($i == $count) {
                    echo '}';
                } else {
                    echo '},';
                }
            }
            ?>
        ];

        // スタート地点、ゴール地点を設定
        var origin = "<?php foreach ($data2 as $row2) {
                            echo $row2['start_lat'] . ',' . $row2['start_long'];
                        } ?>";
        var destination = "<?php foreach ($data2 as $row2) {
                                echo $row2['goal_lat'] . ',' . $row2['goal_long'];
                            } ?>";
    </script>

    <script src="js/mapCode.js"></script>

</body>

</html>
