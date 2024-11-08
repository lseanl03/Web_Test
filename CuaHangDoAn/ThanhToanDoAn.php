<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    
    <?php
        session_start();
        if(!isset($_SESSION['user_name'])){
            echo "Hãy đăng nhập trước khi sử dụng chức năng này <br>";
            echo "<a href='Menu.php'>Quay về menu</a> <br>";
            echo "<a href='DangNhap.html'>Đăng nhập</a> <br>";
            die();
        }
        require("SampleForm.php");
    ?>
    <section class="dat_do_an">
    <h1 class="caption">Danh sách đồ ăn đã đặt</h1>
    <table>
            <tr>
                <th>STT</th>
                <th>Đồ Ăn</th>
                <th>Loại đồ ăn</th>
                <th>Giá</th>
                <th>Mô Tả</th>
                <th class="th_tuy_chon">Tùy chọn</th>
            </tr>
            <?php
            require "Connect.php";
            if($_SESSION['user_name']){
                $user_name = $_SESSION['user_name'];
                $stt = 1;
                $ten_do_an = "";
                $gia = "";
                $mo_ta = "";
                $ten_loai_do_an = "";
                $khach_hang_id = "";
                $ten_khach_hang = "";
                $tong_tien = 0;
                $sql = "SELECT * FROM khach_hang WHERE ten_khach_hang = '$user_name'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $khach_hang_id = $row['khach_hang_id'];
                        $ten_khach_hang = $row['ten_khach_hang'];
                        $do_an_id = $row['do_an_id'];
                        $sql_do_an = "SELECT * FROM do_an WHERE do_an_id = '$do_an_id'";
                        $result_do_an = $connect->query($sql_do_an);
                        
                        if ($result_do_an->num_rows > 0) {
                            $row_do_an = $result_do_an->fetch_assoc();
                            $loai_do_an_id = $row_do_an['loai_do_an_id'];
                            $ten_do_an = $row_do_an['ten_do_an'];
                            $gia = $row_do_an['gia'];
                            $mo_ta = $row_do_an['mo_ta'];
                            $tong_tien += $gia; 
                            $sql_loai_do_an = "SELECT * FROM loai_do_an WHERE loai_do_an_id = '$loai_do_an_id'";
                            $result_loai_do_an = $connect->query($sql_loai_do_an);
                            if ($result_loai_do_an->num_rows > 0) {
                                $row_loai_do_an = $result_loai_do_an->fetch_assoc();
                                $ten_loai_do_an = $row_loai_do_an['ten_loai_do_an'];
                            } 
                        } 
                        echo "<tr>";
                        echo "<td class='td_id'>$stt</td>";
                        echo "<td>$ten_do_an</td>";
                        echo "<td>$ten_loai_do_an</td>";
                        echo "<td class='td_gia'>$gia</td>";
                        echo "<td>$mo_ta</td>";
                        echo "<td class='td_dat_do_an'>
                        <a class='change_button' href='/CuaHangDoAn/DoiDonHang.php?khach_hang_id=$khach_hang_id & ten_do_an_cu= $ten_do_an' onclick=\"return DoiDonHangAn('$ten_do_an')\">Đổi</a>
                        <a class='add_button' href='/CuaHangDoAn/BoChonDoAn.php?khach_hang_id=$khach_hang_id' onclick=\"return BoChonDoAn('$ten_do_an')\">Bỏ chọn</a>
                        </td>";               
                        echo "</tr>";
                        $stt++; 
                    }  
                }
            } 
            $connect->close();
            ?>
        </table>
        <div class="thanh_toan">
            <span>
            <?php
                echo "<a class='add_button' href='/CuaHangDoAn/XacNhanThanhToan.php?ten_khach_hang=$ten_khach_hang' onclick=\"return ThanhToan('$tong_tien')\">Thanh toán</a>";
            ?>
            </span>
            <span>
            <?php
                echo "<a class='add_button' href='/CuaHangDoAn/BoChonTatCaDoAn.php?ten_khach_hang=$ten_khach_hang' onclick=\"return BoChonTatCaDoAn('$tong_tien')\">Bỏ chọn tất cả</a>";
            ?>
            </span>
        </div>
    </section>
</div>
</body>
</html>