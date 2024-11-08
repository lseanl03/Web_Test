<?php
    require "Connect.php";
    $user_name = $_GET['user_name'];
    $password = $_GET['password'];
    $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";
    $result = $connect->query($sql);
    if($result->num_rows == 0){
        echo "Tên đăng nhập hoặc mật khẩu sai <br>";
        echo "<a href='DangNhap.html'>Đăng nhập lại</a><br>";
    }
    else{
        echo "Xin chào ".$user_name.", bạn đã đăng nhập thành công <br>";
        session_start();
        $_SESSION['user_name'] = $user_name;
    }
    echo "<a href='menu.php'>Về trang chủ</a>";
    ?>