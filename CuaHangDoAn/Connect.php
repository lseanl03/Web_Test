<?php
$severName = "localhost";
$userName = "root";
$password = "";
$db = "cua_hang_do_an";
$connect = new mysqli($severName,$userName,$password,$db);
if($connect->connect_error){
    die("Connnection failed" . $connect->connect_error);
}
?>