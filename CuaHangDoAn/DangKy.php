<?php
require "Connect.php";

$user_name = $_GET['user_name'];
$password = $_GET['password'];
$re_password = $_GET['re_password'];

// Check tên người dùng đã tồn tại?
$sql = "SELECT * FROM users WHERE user_name = '$user_name'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "Người dùng đã tồn tại <br>";
    echo " <a href='DangKy.html'>Về trang đăng ký</a> <br>";
} 
else {
    //Check xác thực mật khẩu
    if ($password === $re_password) {

        $sql_insert = "INSERT INTO users (user_name, password) VALUES ('$user_name', '$password')";
        if ($connect->query($sql_insert) == true) {
            echo "Đã tạo thành công tài khoản <br>"; 
            echo "<a href='DangNhap.html'>Đăng nhập</a> <br>"; 
        } else {
            echo "Error: " . $sql_insert . "<br>" . $connect->error;
        }
    } else {
        echo "Mật khẩu nhập lại không đúng, vui lòng nhập lại mật khẩu <br>";
        echo " <a href='DangKy.html'>Về trang đăng ký</a> <br>";
    }
}

echo " <a href='Menu.php'>Về Menu</a>";
$connect->close();
?>
