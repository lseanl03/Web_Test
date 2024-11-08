<?php
    require "Connect.php";
    $ten_loai_do_an_xoa = $_GET["ten_loai_do_an_xoa"];
        
    $sql = "DELETE FROM loai_do_an WHERE ten_loai_do_an = '$ten_loai_do_an_xoa'";

    if($connect->query($sql) === true){
        echo "Đã xóa <b>$ten_loai_do_an_xoa</b> khỏi danh sách loại đồ ăn <br>";
        echo "<a href='Menu.php'>Trở về Menu</a> <br>";
        echo "<a href='LoaiDoAn.php'>Trở về trang trước</a>";
    }
    else{
        echo "Error: ".$sql."<br>". $connect->error;
    }
    $connect->close();
?>