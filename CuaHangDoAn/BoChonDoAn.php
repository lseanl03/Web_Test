<?php
    $khach_hang_id = "";
    if(isset($_GET['khach_hang_id'])){
        require "Connect.php";
        $khach_hang_id = $_GET["khach_hang_id"];
        $sql = "DELETE FROM khach_hang WHERE khach_hang_id = '$khach_hang_id'";
        $connect->query($sql);
    }
    header("location: /CuaHangDoAn/ThanhToanDoAn.php");
    exit();
?>
