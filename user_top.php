<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();
$files3 = getAllFile3();
$files4 = getAllFile4();
$files5 = getAllFile5();
$files6 = getAllFile6();
$files7 = getAllFile7();
$files8 = getAllFile8();
$files9 = getAllFile9();
$files10 = getAllFile10();
$files11 = getAllFile11();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザートップ</title>
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
        <div>
            <?php foreach($files3 as $file3): ?>
                <img src="<?php echo "{$file3['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files4 as $file4): ?>
                <img src="<?php echo "{$file4['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files5 as $file5): ?>
                <img src="<?php echo "{$file5['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
        </div><br>
        <div>
            <?php foreach($files6 as $file6): ?>
                <img src="<?php echo "{$file6['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files7 as $file7): ?>
                <img src="<?php echo "{$file7['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files8 as $file8): ?>
                <img src="<?php echo "{$file8['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
        </div><br>
        <div>
            <?php foreach($files9 as $file9): ?>
                <img src="<?php echo "{$file9['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files10 as $file10): ?>
                <img src="<?php echo "{$file10['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files11 as $file11): ?>
                <img src="<?php echo "{$file11['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
        </div><br>
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