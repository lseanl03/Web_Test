<?php
require "Connect.php";
    $ten_loai_do_an = $_GET['ten_loai_do_an'];
    $sql = "INSERT INTO loai_do_an (ten_loai_do_an) VALUES ('$ten_loai_do_an')";      
    $result = $connect->query($sql);
    if ($result === true) {
        echo "Đã thêm loại đồ ăn: <b>$ten_loai_do_an</b> thành công <br>";
        echo "<a href='Menu.php'>Trở về Menu</a><br>";
        echo "<a href='LoaiDoAn.php'>Trở về trang trước</a>";

    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
?>
