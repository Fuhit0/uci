<?php
session_start();
require_once"./functions.php";
$files20 = getAllFile20();
$files19 = getAllFile19();
$files15 = getAllFile15();
$files14 = getAllFile14();
$files13 = getAllFile13();

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
                labels: ['8月1日', '8月2日', '8月3日', '8月4日', '8月5日', '8月6日', '8月7日'],
                datasets: [
                    {
                    label: 'OTA',
                    data: [62, 65, 93, 85, 51, 66, 47],
                    backgroundColor: "rgba(219,39,91,0.5)"
                    },{
                    label: 'SNS',
                    data: [55, 45, 73, 75, 41, 45, 58],
                    backgroundColor: "rgba(130,201,169,0.5)"
                    },{
                    label: '公式HP',
                    data: [33, 45, 62, 55, 31, 45, 38],
                    backgroundColor: "rgba(255,183,76,0.5)"
                    }
                ]
                },
                options: {
                title: {
                    display: true,
                    text: 'チャネル別予約数'
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 25,
                        callback: function(value, index, values){
                        return  value +  '人'
                        }
                    }
                    }]
                },
                }
            });
        </script>
    </div>
    <body>
        <canvas id="myRaderChart"></canvas>
        <!-- CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

        <script>
            var ctx = document.getElementById("myRaderChart");
            var myRadarChart = new Chart(ctx, {
                type: 'radar', 
                data: { 
                    labels: ["内装", "設備", "接客", "料理", "サービス"],
                    datasets: [{
                        label: 'RoomA',
                        data: [92, 72, 86, 74, 86],
                        backgroundColor: 'RGBA(225,95,150, 0.5)',
                        borderColor: 'RGBA(225,95,150, 1)',
                        borderWidth: 1,
                        pointBackgroundColor: 'RGB(46,106,177)'
                    }, {
                        label: 'RoomB',
                        data: [73, 95, 80, 87, 79],
                        backgroundColor: 'RGBA(115,255,25, 0.5)',
                        borderColor: 'RGBA(115,255,25, 1)',
                        borderWidth: 1,
                        pointBackgroundColor: 'RGB(46,106,177)'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'お客様満足度'
                    },
                    scale:{
                        ticks:{
                            suggestedMin: 0,
                            suggestedMax: 100,
                            stepSize: 25,
                            callback: function(value, index, values){
                                return  value +  '点'
                            }
                        }
                    }
                }
            });
        </script>
    </body>
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