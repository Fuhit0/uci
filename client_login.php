<?php
require_once"./functions.php";
$files = getAllFile12();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クライアントログイン</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <link rel="stylesheet" href="Login.css" type="text/css">
</head>

<body>
    <style type="text/css">
        body {
          <?php foreach($files as $file): ?>
            background-image: url("<?php echo "{$file['file_path']}"; ?>");
            /* 画像 */
          <?php endforeach; ?>
            background-size: cover;
            /* 全画面 */
            background-attachment: fixed;
            /* 固定 */
            background-position: center top;
            /* 縦横中央 */
        }
    </style>
    <form name="login_form" action="client_login_act.php" method="POST">
        <div class="login_form_top">
            <h1>LOGIN</h1>
            <div class="login_form_btm">
                <input type="id" name="user_id" placeholder="UserID">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="botton" value="LOGIN">
            </div>
    </form>
</body>

</html>
