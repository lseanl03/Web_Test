<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['user_name'])){
        echo "Tài khoản đã đăng xuất, hẹn gặp lại bạn lần sau. <br>";
        unset($_SESSION['user_name']);
    }
    ?>
    <a href="Menu.php">Trở về Menu</a>
</body>
</html>