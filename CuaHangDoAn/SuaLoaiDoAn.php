<?php
require "Connect.php";
    $ten_loai_do_an_cu = $_GET["ten_loai_do_an_cu"];
    $ten_loai_do_an_moi = $_GET["ten_loai_do_an_moi"];

    $sql = "UPDATE loai_do_an SET ten_loai_do_an ='$ten_loai_do_an_moi' WHERE ten_loai_do_an = '$ten_loai_do_an_cu'";

    if($connect -> query($sql) === true){
        echo "Loại đồ ăn <b>$ten_loai_do_an_cu</b> đã được cập nhật thành <b>$ten_loai_do_an_moi</b> <br>";
        echo "<a href='Menu.php'>Trở về Menu</a><br>";
        echo "<a href='LoaiDoAn.php'>Trở về trang trước</a>";
    }
    else{
        echo "Error update:". $connect->error;
    }
?>