<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files16 = getAllFile16();
$files17 = getAllFile17();
$files18 = getAllFile18();
$files3 = getAllFile3();
$files4 = getAllFile4();
$files5 = getAllFile5();
$files6 = getAllFile6();
$files7 = getAllFile7();
$files8 = getAllFile8();
$files9 = getAllFile9();
$files10 = getAllFile10();
$files11 = getAllFile11();

$pdo = connect_to_db();
$sql = 'SELECT tmp1.file_path FROM
(SELECT 
update_time,
file_path,
row_number() over(order by update_time desc)as num
FROM files
WHERE 
id >2
AND
id <12) tmp1
Where 
tmp1.num=1
OR
tmp1.num=2
OR
tmp1.num=3
' ;

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

$sql2 = 'SELECT 
file_path
FROM
(
SELECT
	recommed.hotels_id
FROM
	(SELECT DISTINCT
		hotels_id
	FROM
		bookings
	INNER JOIN
		(SELECT DISTINCT
			users_id
		FROM
			bookings
		INNER JOIN
			(SELECT DISTINCT
				hotels_id
			FROM
				bookings
			WHERE
				users_id = 1) as mybookings
		ON
			bookings.hotels_id = mybookings.hotels_id
		WHERE
			users_id <>1) as others
	ON
		bookings.users_id = others.users_id) as recommed
		
LEFT OUTER JOIN
	(SELECT DISTINCT
		hotels_id
	FROM
		bookings
	WHERE
		users_id = 1) as mybookings2
ON
	recommed.hotels_id = mybookings2.hotels_id
WHERE
mybookings2.hotels_id is null
) as recommend_hotels
LEFT OUTER JOIN
files
ON
recommend_hotels.hotels_id = files.id
Limit 3
' ;

$stmt2 = $pdo->prepare($sql2);

try {
  $status2 = $stmt2->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>道草する</title>
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
        <!-- <form method=”get” action=http://www.google.co.jp/search target=”_blank”>
            <input type=”text” name="query" size="30" maxlength="255" value="">
            <input type=”submit” name="btn" value="検索">
            <input type="hidden" name="hl" value="ja">
            <input type="hidden" name="sitesearch" value="">
        </form> -->
        <div>
            <h3>あなたへのおすすめ</h><br>
                <img src="<?php echo "{$result2[0]['file_path']}"; ?>" width="100px" height="100px">
                <img src="<?php echo "{$result2[1]['file_path']}"; ?>" width="100px" height="100px">
                <img src="<?php echo "{$result2[2]['file_path']}"; ?>" width="100px" height="100px">
        </div>
        <div>
            <h3>新着</h><br>
                <img src="<?php echo "{$result[0]['file_path']}"; ?>" width="100px" height="100px">
                <img src="<?php echo "{$result[1]['file_path']}"; ?>" width="100px" height="100px">
                <img src="<?php echo "{$result[2]['file_path']}"; ?>" width="100px" height="100px">
        </div>
        <div>
            <h3>today's pick up</h><br>
            <?php foreach($files6 as $file6): ?>
                <img src="<?php echo "{$file6['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files7 as $file7): ?>
                <img src="<?php echo "{$file7['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
            <?php foreach($files8 as $file8): ?>
                <img src="<?php echo "{$file8['file_path']}"; ?>" width="100px" height="100px">
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

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