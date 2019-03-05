<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/route-list.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Mincho" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.inview.js"></script>
</head>
<body>

    <header id="commonHeader">
        <div id= "gnavLogo">
            <a href="#"><h1>logo<img src="#"></h1></a>
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
    <img src="" width=100% height=37%>
    <h2>ルート一覧</h2>
    <ul id="routeSort">
        <li id="all"><a href='route-list.php?level=all'>全て</a></li>
        <li class="beginner"> <a href='route-list.php?level=beginner'>初級</a></li>
        <li class="standard"> <a href=' route-list.php?level=standard'>中級</a></li>
        <li class="advanced"><a href=' route-list.php?level=advanced'>上級</a></li>
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
        echo '<a href="#">';
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
        echo '<p class="detail"><a href="routedetail.php?course_id=' . $row['id'] . '" target="_blank">詳細へ</a></p>';
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
        echo '<a href="#">';
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
        echo '<p class="detail"><a  class="detail" href="routedetail.php?course_id=' . $row['id'] . '" target="_blank">詳細へ</a></p>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
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
        <div class="back">
            <ul class="banner">
                <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li>
                <li><a href="">バナー</a></li>
            </ul>
            <p>©道プロジェクト</p>
        </div>
    </footer>
</body>
</html>