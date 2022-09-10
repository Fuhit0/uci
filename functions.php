<?php
//DB接続
function connect_to_db()
{
  $dbn='mysql:dbname=origojapan_uci;charset=utf8mb4;port=3306;host=mysql639.db.sakura.ne.jp';
  $user = 'origojapan';
  $pwd = 't=Z49vd+Cnr3';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}

//セッションチェック
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] != session_id()) {
    header('Location:todo_login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}

//ファイルデータを取得
function getAllFile3(){
    $sql3 = "SELECT * FROM files WHERE id =3";

    $fileData3 = connect_to_db()->query($sql3);

    return $fileData3;
}

function getAllFile4(){
    $sql4 = "SELECT * FROM files WHERE id =4";

    $fileData4 = connect_to_db()->query($sql4);

    return $fileData4;
}

function getAllFile5(){
    $sql5 = "SELECT * FROM files WHERE id =5";

    $fileData5 = connect_to_db()->query($sql5);

    return $fileData5;
}

function getAllFile6(){
    $sql6 = "SELECT * FROM files WHERE id =6";

    $fileData6 = connect_to_db()->query($sql6);

    return $fileData6;
}

function getAllFile7(){
    $sql7 = "SELECT * FROM files WHERE id =7";

    $fileData7 = connect_to_db()->query($sql7);

    return $fileData7;
}

function getAllFile8(){
    $sql8 = "SELECT * FROM files WHERE id =8";

    $fileData8 = connect_to_db()->query($sql8);

    return $fileData8;
}

function getAllFile9(){
    $sql9 = "SELECT * FROM files WHERE id =9";

    $fileData9 = connect_to_db()->query($sql9);

    return $fileData9;
}

function getAllFile10(){
    $sql10 = "SELECT * FROM files WHERE id =10";

    $fileData10 = connect_to_db()->query($sql10);

    return $fileData10;
}

function getAllFile11(){
    $sql11 = "SELECT * FROM files WHERE id =11";

    $fileData11 = connect_to_db()->query($sql11);

    return $fileData11;
}

function getAllFile12(){
    $sql12= "SELECT * FROM files WHERE id =12";

    $fileData12 = connect_to_db()->query($sql12);

    return $fileData12;
}

function getAllFile13(){
    $sql13 = "SELECT * FROM files WHERE id =13";

    $fileData13 = connect_to_db()->query($sql13);

    return $fileData13;
}

function getAllFile14(){
    $sql14 = "SELECT * FROM files WHERE id =14";

    $fileData14 = connect_to_db()->query($sql14);

    return $fileData14;
}

function getAllFile15(){
    $sql15 = "SELECT * FROM files WHERE id =15";

    $fileData15 = connect_to_db()->query($sql15);

    return $fileData15;
}

function getAllFile16(){
    $sql16 = "SELECT * FROM files WHERE id =16";

    $fileData16 = connect_to_db()->query($sql16);

    return $fileData16;
}

function getAllFile17(){
    $sql17 = "SELECT * FROM files WHERE id =17";

    $fileData17 = connect_to_db()->query($sql17);

    return $fileData17;
}

function getAllFile18(){
    $sql18 = "SELECT * FROM files WHERE id =18";

    $fileData18 = connect_to_db()->query($sql18);

    return $fileData18;
}

function getAllFile19(){
    $sql19 = "SELECT * FROM files WHERE id =19";

    $fileData19 = connect_to_db()->query($sql19);

    
    return $fileData19;
}

function getAllFile20(){
    $sql20 = "SELECT * FROM files WHERE id =20";

    $fileData20 = connect_to_db()->query($sql20);

    return $fileData20;
}

?>
