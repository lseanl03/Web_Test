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
        <h1 class="caption">Tìm kiếm đồ ăn</h1>
        <form action="" method="get" class="search_form">
            <div class = "input">
                <input type="text" name = "do_an" placeholder="Nhập từ khóa">
                <input type="submit" name = "search" value = "Search">
            </div>
        </form>
        <?php
        if(isset($_GET["search"])){
            $search = $_GET["do_an"];
            if($search === ""){
                echo " <br><h5 class='text_h5'>Hãy nhập thông tin trước khi tìm kiếm</h5>";
            } else {
                require "Connect.php";
                $stt = 1;
                $sql = "SELECT * FROM do_an WHERE ten_do_an LIKE '%$search%' OR do_an_id = '$search' OR gia = '$search'";
                $result = $connect->query($sql);
                echo "<br><h5 class='text_h5'>Tìm thấy <b>$result->num_rows</b> kết quả đồ ăn cho từ khóa '<b>$search</b>'</h5>";

                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr>
                            <th>STT</th>
                            <th>Đồ Ăn</th>
                            <th>Loại đồ ăn</th>
                            <th>Giá</th>
                            <th>Mô Tả</th>
                            <th>Đặt đồ ăn</th>
                          </tr>";

                    while ($row = $result->fetch_assoc()) {
                        $loai_do_an_id = $row['loai_do_an_id'];
                        $sql_loai_do_an = "SELECT * FROM loai_do_an WHERE loai_do_an_id = '$loai_do_an_id'";
                        $result_loai_do_an = $connect->query($sql_loai_do_an);

                        if ($result_loai_do_an->num_rows > 0) {
                            $row_loai_do_an = $result_loai_do_an->fetch_assoc();
                            $ten_loai_do_an = $row_loai_do_an['ten_loai_do_an'];
                        } else {
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
                        echo "<td class='td_dat_do_an'><a class='add_button' href='/CuaHangDoAn/ThemDatDoAnTimKiem.php?do_an_id=$do_an_id' onclick=\"return DatDoAn('$ten_do_an')\">Đặt đồ ăn</a></td>";               
                        echo "</tr>";
                        $stt++;
                    }
                    echo "</table>";
                }

                $connect->close();
            }
        }
        ?>              
    </section>
</div>
</body>
</html>

