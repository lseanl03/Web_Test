<?php
require "Connect.php";
    $ten_do_an_cu = $_GET["ten_do_an_cu"];
    $ten_do_an_moi = $_GET["ten_do_an_moi"];
    $gia_moi = $_GET["gia_moi"];
    $mo_ta_moi = $_GET["mo_ta_moi"];

    $sql = "UPDATE do_an SET ten_do_an ='$ten_do_an_moi', gia ='$gia_moi', mo_ta ='$mo_ta_moi' WHERE ten_do_an = '$ten_do_an_cu'";

    if($connect -> query($sql) === true){
        echo "Đồ ăn <b>$ten_do_an_cu</b> đã được cập nhật thành <b>$ten_do_an_moi</b><br>";
        echo "<a href='Menu.php'>Trở về Menu</a> <br>";
        echo "<a href='DoAn.php'>Trở về trang trước</a>";
    }
    else{
        echo "Error update:". $connect->error;
    }
?>