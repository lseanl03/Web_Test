<?php
require "Connect.php";
    $ten_loai_do_an = $_GET['ten_loai_do_an'];
    $ten_do_an = $_GET['ten_do_an'];
    $gia = $_GET['gia'];
    $mo_ta = $_GET['mo_ta'];
    $sql = "SELECT loai_do_an_id FROM loai_do_an WHERE ten_loai_do_an = '$ten_loai_do_an'";
    $result = $connect->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result -> fetch_assoc();
        $loai_do_an_id = $row['loai_do_an_id'];
        $sql = "INSERT INTO do_an (loai_do_an_id, ten_do_an, gia, mo_ta) VALUES ('$loai_do_an_id', '$ten_do_an', '$gia', '$mo_ta')";      
        if ($connect->query($sql) === true) {
            echo "Đã thêm đồ ăn: $ten_do_an thành công <br>";
            echo "<a href='Menu.php'>Trở về Menu</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } 
    else {
        echo "Không thể lấy ID của loại đồ ăn.";
    }
?>
