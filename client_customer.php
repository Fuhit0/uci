<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files15 = getAllFile15();
$files14 = getAllFile14();
$files13 = getAllFile13();

$pdo = connect_to_db();
$sql = 'SELECT * FROM bookings LEFT JOIN users ON bookings.users_id = users.id WHERE hotels_id = 1 AND date = CURDATE() ';
$stmt = $pdo->prepare($sql);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

$output = "";
foreach ($result as $record) {
  $output .= "
    <div>
    <h3>本日のお客様</h3>
    <table>
        <tr>
            <th>お客様名</th>
            <th>ご宿泊日</th>
            <th>チェックイン時間</th>
            <th>ご宿泊人数</th>
            <th>ご料金</th>
        </tr>
        <tr>
        <td>お客様：{$record["name"]}様</td>
        <td>宿泊日：{$record["date"]}</td>
        <td>チェックイン時間：{$record["checkin_time"]}</td>
        <td>宿泊人数：{$record["persons"]}名様</td>
        <td>ご料金：{$record["price"]}円</td>
        </tr>
    </table>
    </div><br>
  ";
}

$sql2 = 'SELECT * FROM bookings LEFT JOIN users ON bookings.users_id = users.id WHERE hotels_id = 1 ';
$stmt2 = $pdo->prepare($sql2);
try {
  $status2 = $stmt2->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$result2 = $stmt2->fetchall(PDO::FETCH_ASSOC);

$output2 = "";
foreach ($result2 as $record2) {
  $output2 .= "
        <tr>
        <td>お客様：{$record2["name"]}</td>
        <td>宿泊日：{$record2["date"]}</td>
        <td>チェックイン時間：{$record2["checkin_time"]}</td>
        <td>宿泊人数：{$record2["persons"]}名様</td>
        <td>ご料金：{$record2["price"]}円</td>
        </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認する</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <link rel="stylesheet" href="User.css" type="text/css">
</head>

<body>
    <header>
        <h1>
        <a href="<?php echo "client_top.php" ?>">
        <?php foreach($files20 as $file20): ?>
            <img src="<?php echo "{$file20['file_path']}"; ?>" width="30px" height="30px">
        <?php endforeach; ?>
        </a>
        </h1>
        <nav class="gnav">
            <ul class="menu">
                <li>
                    <a href="<?php echo "client_logout.php" ?>">
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
      <?= $output ?>
    </tbody>
    <tbody>
        <div>
            <h3>全てのお客様</h3>
            <table>
                <tr>
                    <th>お客様名</th>
                    <th>ご宿泊日</th>
                    <th>チェックイン時間</th>
                    <th>ご宿泊人数</th>
                    <th>ご料金</th>
                </tr>   
            <?= $output2 ?>
            </table>
        </div>
    </tbody>
    </div>
    <footer class="footer">
        <nav class="global-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="<?php echo "client_sales.php" ?>">
                        <?php foreach($files15 as $file15): ?>
                            <img src="<?php echo "{$file15['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>分析する</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "client_customer.php" ?>">
                        <?php foreach($files14 as $file14): ?>
                            <img src="<?php echo "{$file14['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>確認する</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "client_book.php" ?>">
                        <?php foreach($files13 as $file13): ?>
                            <img src="<?php echo "{$file13['file_path']}"; ?>" width="30px" height="30px">
                        <?php endforeach; ?>
                        <span>売止する</span>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>