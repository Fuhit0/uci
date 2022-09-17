<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL ORIGO HAKATA - Gion -</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <link rel="stylesheet" href="User.css" type="text/css">
</head>

<body>
    <header>
        <h1>
        <a href="<?php echo "user_top.php" ?>">
        <?php foreach($files20 as $file20): ?>
            <img src="<?php echo "{$file20['file_path']}"; ?>" width="30px" height="30px">
        <?php endforeach; ?>
        </a>
        </h1>
        <nav class="gnav">
            <ul class="menu">
                <li>
                    <a href="<?php echo "user_logout.php" ?>">
                        <?php foreach($files19 as $file19): ?>
                            <img src="<?php echo "{$file19['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div>
    <tbody>
        <div>
            <h1>HOTEL ORIGO HAKATA - Gion -</h1>
        </div>
        <div>
            <img src="images\lp1.jpg" alt="" width="250px">
        </div>
        <div>
            <span>１．「人と文化が織りなすまちで」</span><br>
            <span>
                福岡市博多区に位置する祇園町は
                オフィスビルが建ち並ぶ ” ビジネス街 ”として知られています。

                一方で「災厄除去の祇園信仰と結びついて山笠神事として発展した」という説があり
                約800年という歴史を持つ”博多祇園山笠”としても有名です。</span>
        </div>
                <div>
            <img src="images\lp2.jpg" alt="" width="250px">
        </div>
        <div>
            <span>博多の中心部。そして、長きに渡り受け継がれる伝統文化が存在する祇園町。
                そんな魅力溢れるこのまちは今もなお、観光客やビジネスマンなど幅広い方々によって時を刻んでいます。</span>
        </div>
                <div>
            <img src="images\lp3.jpg" alt="" width="250px">
        </div>
        <div>
            <span>歴史や伝統あふれる昔らしさ。そして、まちの喧騒から感じられる今っぽさ。
                そんな祇園町にスマートホテルを展開するHOTEL ORIGO 3号店が2021年8月にオープンしました。</span>
        </div>
                <div>
            <img src="images\lp4.jpg" alt="" width="250px">
        </div>
        <div>
            <span>夕焼けに染まりながら包まれていく夜の祇園町は、いろんな音で溢れかえります。

                夕食はまちに出向き、気になるお店にふらっと立ち寄るもよし。
                記憶のどこか一部に残るようなご宿泊様だけの素敵な時間をお過ごしください。</span>
        </div>
                <div>
            <img src="images\lp5.jpg" alt="" width="250px">
        </div>
        <div>
            <span>祇園の長きにわたる伝統とそんなまちに立ち並んでいくビルたちが灯す光が創る様々な記憶とをHOTEL ORIGO HAKATA - Gion -の思い出によってつなげてみませんか？</span>
        </div>
        <div>
            <a href="user_search.php"><input type="button" value="予約画面へ"></a>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>


    </tbody>
    </div>
    <footer class="footer">
        <nav class="global-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="<?php echo "user_mypage.php" ?>">
                        <?php foreach($files16 as $file16): ?>
                            <img src="<?php echo "{$file16['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>マイページ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "user_search.php" ?>">
                        <?php foreach($files17 as $file17): ?>
                            <img src="<?php echo "{$file17['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>予約する</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "user_randomwalk.php" ?>">
                        <?php foreach($files18 as $file18): ?>
                            <img src="<?php echo "{$file18['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>道草する</span>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>