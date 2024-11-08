<?php
    $khach_hang_id = "";
    $do_an_id = "";
    if(isset($_GET['khach_hang_id']) && isset($_GET['do_an_id'])){
        require "Connect.php";
        $khach_hang_id = $_GET["khach_hang_id"];
        $do_an_id = $_GET["do_an_id"];
        $sql = "UPDATE khach_hang SET do_an_id ='$do_an_id' WHERE khach_hang_id = '$khach_hang_id'";
        $connect->query($sql);
    }
    header("location: /CuaHangDoAn/ThanhToanDoAn.php");
    exit();
?>
