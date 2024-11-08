<?php
    $ten_khach_hang = "";
    if(isset($_GET['ten_khach_hang'])){
        require "Connect.php";
        $ten_khach_hang = $_GET["ten_khach_hang"];
        $sql = "DELETE FROM khach_hang WHERE ten_khach_hang = '$ten_khach_hang'";
        $connect->query($sql);
    }
    header("location: /CuaHangDoAn/ThanhToanDoAn.php");
    exit();
?>