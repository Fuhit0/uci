<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();

// todo_create.php

if (
  !isset($_POST['id']) || $_POST['id']=='' ||
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['users_id']) || $_POST['users_id']=='' ||
  !isset($_POST['want_date']) || $_POST['want_date']=='' ||
  !isset($_POST['want_person']) || $_POST['want_person']=='' ||
  !isset($_POST['price']) || $_POST['price']=='' ||
  !isset($_POST['file_path']) || $_POST['file_path']==''
) {
  exit('ParamError');
}

$id = $_POST['id'];
$name = $_POST['name'];
$users_id = $_POST['users_id'];
$want_date = $_POST['want_date'];
$want_person = $_POST['want_person'];
$price = $_POST['price'];
$file_path = $_POST['file_path'];

// var_dump($id);
// var_dump($users_id);
// var_dump($want_date);
// var_dump($want_person);
// var_dump($file_path);

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
       
        <br>お宿名：<?= $name ?>
        <br><img src="<?= $file_path ?>" alt="" width="100px" height="100px">
        <br>チェックイン日：<?= $want_date ?>
        <br>人数：<?= $want_person ?>名様
        <br>ご料金：<?= $price ?>円

            <td><form action='user_search_confirm_act.php' method='POST'>
            <div>
            <input type='hidden' name='id' value='<?= $id ?>'>
            </div>
            <div>
            <input type='hidden' name='want_date' value='<?= $want_date ?>'>
            </div>           
            <div>
            <input type='hidden' name='want_person' value='<?= $want_person ?>'>
            </div>
            <div>
            <input type='hidden' name='price' value='<?= $price ?>'>
            </div>   
            <div>
            <input type='hidden' name='users_id' value='1'>
            </div>
            <div>
            <input type='hidden' name='checkin_time' value='16:00'>
            </div>
            <button>確定する</button>
            </div>
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