<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files15 = getAllFile15();
$files14 = getAllFile14();
$files13 = getAllFile13();

$pdo = connect_to_db();
$sql_pv = 'SELECT count(DISTINCT session_id) AS PV FROM trackings WHERE hotels_id = 1';
$stmt_pv = $pdo->prepare($sql_pv);
try {
  $status_pv = $stmt_pv->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$record_pv = $stmt_pv->fetch(PDO::FETCH_ASSOC);

$sql_sls = 'SELECT SUM(price) AS Sales FROM bookings WHERE hotels_id = 1';
$stmt_sls = $pdo->prepare($sql_sls);
try {
  $status_sls = $stmt_sls->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$record_sls = $stmt_sls->fetch(PDO::FETCH_ASSOC);

$sql_bk = 'SELECT count(DISTINCT users_id) AS Books FROM bookings WHERE hotels_id = 1';
$stmt_bk = $pdo->prepare($sql_bk);
try {
  $status_bk = $stmt_bk->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$record_bk = $stmt_bk->fetch(PDO::FETCH_ASSOC);

$sql_ps = 'SELECT COUNT(id) AS Persons FROM bookings WHERE hotels_id = 1 AND date = CURDATE()';
$stmt_ps = $pdo->prepare($sql_ps);
try {
  $status_ps = $stmt_ps->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$record_ps = $stmt_ps->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分析する</title>
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
    <div class="kpi">
        <div class="kpi">
            <?= $record_pv["PV"] ?>
        </div>
       <div class="kpi">
            <?= $record_sls["Sales"] ?>
        </div>
        <div class="kpi">
            <?= $record_bk["Books"] ?>
        </div>
        <div class="kpi">
            <?= $record_ps["Persons"] ?>
        </div>
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