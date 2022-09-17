<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();

if (
  !isset($_POST['want_date']) || $_POST['want_date']=='' ||
  !isset($_POST['want_person']) || $_POST['want_person']==''
) {
  exit('ParamError');
}

$want_date = $_POST['want_date'];
$want_person = $_POST['want_person'];

// var_dump($wante_person);

$pdo = connect_to_db();
$sql = 'SELECT *
FROM
    (SELECT *
    FROM
    (SELECT
    stocks.hotels_id,
    stocks.date,
    hotels.capacity,
    hotels.price,
    hotels.name
    FROM
    stocks
    LEFT OUTER JOIN
    hotels
    ON
    stocks.hotels_id = hotels.id
    WHERE
    stocks.stop_flg = 0
    AND
    hotels.delete_flg = 0 ) as tmp1
    WHERE
    tmp1.date = "'. $want_date .'"
    AND
    tmp1.capacity >= "'. $want_person .'") as tmp2
LEFT OUTER JOIN
files
ON
tmp2.hotels_id = files.id
';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);

$output = "";
foreach ($result as $record) {
  $output .= "
    <div>
    <h3>検索結果</h3>
    <table>
        <tr>
        <td><img src='{$record["file_path"]}' alt='' width='200px' height='200px'></td>
        <td>料金：{$record["name"]}</td>
        <td>料金：{$record["price"]}円</td>
        <td><form action='user_search_confirm.php' method='POST'>
            <div>
            <input type='hidden' name='id' value='{$record["id"]}'>
            </div>
            <div>
            <input type='hidden' name='name' value='{$record["name"]}'>
            </div>           
            <div>
            <input type='hidden' name='want_date' value='{$want_date}'>
            </div>
            <div>
            <input type='hidden' name='want_person' value='{$want_person}'>
            </div>
            <div>
            <input type='hidden' name='price' value='{$record["price"]}'>
            </div>   
            <div>
            <input type='hidden' name='file_path' value='{$record["file_path"]}'>
            </div>
            <div>
            <input type='hidden' name='users_id' value='1'>
            </div>
            <button>ここにする</button>
            </div>
        </form></td>
        </tr>
    </table>
    </div><br>
  ";
}





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
      <?= $output ?>
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