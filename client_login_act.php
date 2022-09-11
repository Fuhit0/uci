<?php
session_start();
include('functions.php');

$user_id = $_POST['user_id'];
$password = $_POST['password'];

$pdo = connect_to_db();

// user_id，password，is_deleted, admin_flgの4項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM users WHERE user_id=:user_id AND user_pass=:password AND admin_flg=1 AND delete_flg=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

//データの有無で条件分岐する
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=client_login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['users_id'] = $val['id'];
  header("Location:client_top.php");
  exit();
}
