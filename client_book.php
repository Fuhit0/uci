<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files15 = getAllFile15();
$files14 = getAllFile14();
$files13 = getAllFile13();

//stocsから自宿の在庫データを参照する
$pdo = connect_to_db();
$sql = 'SELECT * FROM stocks WHERE hotels_id = 1 AND date >= CURDATE()' ;
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
    <form action='client_book_update.php' method='POST'>
      <td>{$record["date"]}</td>
      <td>
        <input type='hidden' name='date' value='{$record["date"]}'>
        <input type='text' name='stop_flg' value='{$record["stop_flg"]}'>
        <input type='hidden' name='id' value='{$record["id"]}'>
      </td>
      <td><button>更新</button></td>
    </form>
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
    <title>売止する</title>
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
        <table>
  <?= $output ?>
  </table>
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