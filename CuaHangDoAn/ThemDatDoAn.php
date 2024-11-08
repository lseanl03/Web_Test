<?php
        $do_an_id = "";
        $user_id = "";
        $ten_khach_hang = "";
    if(isset($_GET['do_an_id'])){
        require "Connect.php";
        $do_an_id = $_GET["do_an_id"];
        session_start();
        if($_SESSION["user_name"]){
            $ten_khach_hang = $_SESSION["user_name"];
            $sql = "SELECT * FROM users WHERE user_name = '$ten_khach_hang'";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user_id = $row["user_id"];
            } 
        }
        $sql = "INSERT INTO khach_hang (ten_khach_hang, user_id, do_an_id) VALUES ('$ten_khach_hang', '$user_id', '$do_an_id')";
        $connect->query($sql);
    }
    header("location: /CuaHangDoAn/DatDoAn.php");
    exit();
?>
