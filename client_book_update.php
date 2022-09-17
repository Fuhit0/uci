<?php
if (
  !isset($_POST['date']) || $_POST['date'] == '' ||
  !isset($_POST['stop_flg']) || $_POST['stop_flg'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  exit('paramError');
}

$date = $_POST['date'];
$stop_flg = $_POST['stop_flg'];
$id = $_POST['id'];

include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE stocks SET date=:date, stop_flg=:stop_flg, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':stop_flg', $stop_flg, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:client_book.php');
exit();
