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
    <h1 class="caption">Danh sách đồ ăn</h1>
    <form action="" method="get">
        <table>
            <tr>
                <th>STT</th>
                <th>Đồ Ăn</th>
                <th>Loại đồ ăn</th>
                <th>Giá</th>
                <th>Mô Tả</th>
                <th class="th_dat_do_an">Đặt đồ ăn</th>
            </tr>
            <?php
            require "Connect.php";
            $stt = 1;
            $sql = "SELECT * FROM do_an";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $loai_do_an_id = $row['loai_do_an_id'];
                    $sql_loai_do_an = "SELECT * FROM loai_do_an WHERE loai_do_an_id = '$loai_do_an_id'";
                    $result_loai_do_an = $connect->query($sql_loai_do_an);
                    
                    if ($result_loai_do_an->num_rows > 0) {
                        $row_loai_do_an = $result_loai_do_an->fetch_assoc();
                        $ten_loai_do_an = $row_loai_do_an['ten_loai_do_an'];
                    } 
                    else {
                        $loai_do_an = "Không xác định";
                    }
                    $do_an_id = $row['do_an_id'];
                    $ten_do_an = $row['ten_do_an'];
                    $gia = $row['gia'];
                    $mo_ta = $row['mo_ta'];
                    echo "<tr>";
                    echo "<td class='td_id'>$stt</td>";
                    echo "<td>$ten_do_an</td>";
                    echo "<td>$ten_loai_do_an</td>";
                    echo "<td class='td_gia'>$gia</td>";
                    echo "<td>$mo_ta</td>";
                    echo "<td class='td_dat_do_an'><a class='add_button' href='/CuaHangDoAn/ThemDatDoAn.php?do_an_id=$do_an_id' onclick=\"return DatDoAn('$ten_do_an')\">Đặt đồ ăn</a></td>";               
                    echo "</tr>";
                    $stt++; 
                }   
            } 
            $connect->close();
            ?>
        </table>
    </form>
    </section>
</div>
</body>
</html>