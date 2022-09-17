<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files15 = getAllFile15();
$files14 = getAllFile14();
$files13 = getAllFile13();

// $todaym7 = date('Y/m/d',strtotime("today -7 day")) ;
// $todaym6 = date('Y/m/d',strtotime("today -6 day")) ;
// $todaym5 = date('Y/m/d',strtotime("today -5 day")) ;
// $todaym4 = date('Y/m/d',strtotime("today -4 day")) ;
// $todaym3 = date('Y/m/d',strtotime("today -3 day")) ;
// $todaym2 = date('Y/m/d',strtotime("today -2 day")) ;
// $todaym1 = date('Y/m/d',strtotime("today -1 day")) ;
// $today = date('Y/m/d') ;
// $todayp1 = date('Y/m/d',strtotime("today +1 day")) ;
// $todayp2 = date('Y/m/d',strtotime("today +2 day")) ;
// $todayp3 = date('Y/m/d',strtotime("today +3 day")) ;
// $todayp4 = date('Y/m/d',strtotime("today +4 day")) ;
// $todayp5 = date('Y/m/d',strtotime("today +5 day")) ;
// $todayp6 = date('Y/m/d',strtotime("today +6 day")) ;
// $todayp7 = date('Y/m/d',strtotime("today +7 day")) ;

$pdo = connect_to_db();
$sql = 'SELECT * FROM bookings WHERE hotels_id = 1 ' ;
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output_label[] = "";
foreach ($result as $record) {
  $output_label[] .= $record["date"];
}

$output_price[] = "";
foreach ($result as $record) {
  $output_price[] .= $record["price"];
}

$sql_ot = 'SELECT * FROM bookings WHERE hotels_id = 2 ' ;
$stmt_ot = $pdo->prepare($sql_ot);

try {
  $status_ot = $stmt_ot->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result_ot = $stmt_ot->fetchAll(PDO::FETCH_ASSOC);
$output_ot[] = "";
foreach ($result_ot as $record_ot) {
  $output_ot[] .= $record_ot["price"];
}
// var_dump($output_ot);



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
    <div>
        <canvas id="myBarChart"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

        <script>
            var ctx = document.getElementById("myBarChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['<?= $output_label[1]?>','<?= $output_label[2]?>','<?= $output_label[3]?>','<?= $output_label[4]?>','<?= $output_label[5]?>','<?= $output_label[6]?>','<?= $output_label[7]?>'],
                datasets: [
                    {
                    label: '自宿',
                    data: ['<?= $output_price[1]?>','<?= $output_price[2]?>','<?= $output_price[3]?>','<?= $output_price[4]?>','<?= $output_price[5]?>','<?= $output_price[6]?>','<?= $output_price[7]?>'],
                    backgroundColor: "rgba(219,39,91,0.5)"
                    },{
                    label: '競合',
                    data: ['<?= $output_ot[1]?>','<?= $output_ot[2]?>','<?= $output_ot[3]?>','<?= $output_ot[4]?>','<?= $output_ot[5]?>','<?= $output_ot[6]?>','<?= $output_ot[7]?>'],
                    backgroundColor: "rgba(130,201,169,0.5)"
                    }
                ]
                },
                options: {
                title: {
                    display: true,
                    text: '売上競合比較'
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 1000,
                        callback: function(value, index, values){
                        return  value +  '円'
                        }
                    }
                    }]
                },
                }
            });
        </script>
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