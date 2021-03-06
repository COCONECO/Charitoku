<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/route-list.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">
        <!-- icon -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
</head>

<body>

    <header id="commonHeader">
        <div id="gnavLogo">
            <a href="index.php">
                <h1>知っとく走っとく徳島サイクリングロード<div class="logoImages"><div></h1>
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
    <div class="coverImg">
        <img src="images/top/route-list-top.jpg" width=100% height=360px>
    </div>
    <h2 id="route">ルート一覧</h2>
    <ul id="routeSort">
        <li id="all"><a href='route-list.php?level=all#route'>全て</a></li>
        <li class="beginner"> <a href='route-list.php?level=beginner#route'>初級</a></li>
        <li class="standard"> <a href=' route-list.php?level=standard#route'>中級</a></li>
        <li class="advanced"><a href=' route-list.php?level=advanced#route'>上級</a></li>
    </ul>


    <?php
// echo urldecode($_GET['level']);
if ($_GET['level']) {
    if ($_GET['level'] !== "all") {
        $level = $_GET['level'];
        //var_dump($level);
    } else {
        $level = 'all';
    }
}

// echo $level;

//DB接続
$dsn = 'mysql:host=localhost;dbname=charitoku;charset=utf8';
$user = 'root';
$password = '';
if ($level !== 'all') {
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("select * from course where level = :level and del_flag=0 order by popularity desc ");
        $stmt->bindParam(':level', $level, PDO::PARAM_STR);
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

        echo '<li class="itemBox grid5Pc grid10 fadein">';
        echo '<a href="route-details.php?course_id=' . $row['id'] . '"  target="_blank">';
        echo '<img class="mainImg" src="./images/route/' . $row['picture_filename'] . '" alt="">';
        $id = intval($row['id']);
        try {
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $db->prepare("select * from course_route where course_id  = $id limit 3");
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
        echo '<dd>約' . $row['time'] . '分</dd>';
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
} else {
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("select * from course where del_flag=0 order by popularity desc ");
        //$stmt->bindParam(':course_id', $course_id, PDO::PARAM_STR);
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
        echo '<li class="itemBox grid5Pc grid10 fadein">';
        echo '<a  class="detail" href="route-details.php?course_id=' . $row['id'] . '" target="_blank">';
        echo '<img class="mainImg" src="./images/route/' . $row['picture_filename'] . '" alt="">';
        $id = intval($row['id']);
        try {
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $db->prepare("select * from course_route where course_id  = $id limit 3");
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
        echo '<dd>約' . $row['time'] . '分</dd>';
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
        echo '<p class="detail shousai"><a  class="detail" href="route-details.php?course_id=' . $row['id'] . '" target="_blank">詳細へ</a></p>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
        echo '</a></p>';
    }
    echo '</ul>';
}

?>

    <!-- <div class="pagenation">
        <ul>
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div> -->
    <footer>
        <div class="back"></div>

            <ul class="sns">
                <li><a href="https://twitter.com/CyclingRoadT?lang=ja"><i class="fab fa-twitter fa-3x"></i></a></li>
                <li><a href="https://www.facebook.com/ProjectRoad/?modal=admin_todo_tour"><i class="fab fa-facebook fa-3x"></i></a></li>
                <li><a href="https://www.instagram.com/projectroad03/"><i class="fab fa-instagram fa-3x"></i></a></li>
            </ul>
            <p>©道プロジェクト</p>
    </footer>
</body>

</html>
