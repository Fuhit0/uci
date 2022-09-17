<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();

if (
  !isset($_POST['id']) || $_POST['id']=='' ||
  !isset($_POST['users_id']) || $_POST['users_id']=='' ||
  !isset($_POST['want_date']) || $_POST['want_date']=='' ||
  !isset($_POST['want_person']) || $_POST['want_person']=='' ||
  !isset($_POST['price']) || $_POST['price']=='' ||
  !isset($_POST['checkin_time']) || $_POST['checkin_time']==''
) {
  exit('ParamError');
}

$id = $_POST['id'];
$users_id = $_POST['users_id'];
$want_date = $_POST['want_date'];
$want_person = $_POST['want_person'];
$price = $_POST['price'];
$checkin_time = $_POST['checkin_time'];

$pdo = connect_to_db();

// SQL作成&実行
$sql = 'INSERT INTO bookings (id, users_id, hotels_id, date, price, persons, checkin_time, cxl_flg, created_at, updated_at) VALUES (NULL, :users_id, :id, :want_date, :price, :want_person, :checkin_time, 0, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':users_id', $users_id, PDO::PARAM_STR);
$stmt->bindValue(':want_date', $want_date, PDO::PARAM_STR);
$stmt->bindValue(':want_person', $want_person, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':checkin_time', $checkin_time, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

  header('Location: user_top.php');
  exit();


?>

