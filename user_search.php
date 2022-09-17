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
    <title>予約する</title>
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
        <form action="user_search_result.php" method="POST">
        <fieldset>
            <div>
            ご希望のチェックイン日: <input type="date" name="want_date">
            </div>
            <div>
            ご宿泊人数: <input type="number" name="want_person">
            </div>
            <div>
            <button>検索する</button>
            </div>
        </fieldset>
        </form>

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