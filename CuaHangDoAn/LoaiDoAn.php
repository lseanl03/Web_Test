<!DOCTYPE html>
<html lang="en">
<head> 
</head>
<body onload=OnLoadLoaiDoAn()>
<div class="container">
    <?php
        session_start();
        if(!isset($_SESSION['user_name'])){
            echo "Hãy đăng nhập trước khi sử dụng chức năng này <br>";
            echo "<a href='Menu.php'>Quay về menu</a> <br>";
            echo "<a href='DangNhap.html'>Đăng nhập</a> <br>";
            die();
        }
        else if($_SESSION['user_name'] != 'admin'){
            echo "Bạn không có quyền truy cập vào trang này <br>";
            echo "<a href='Menu.php'>Quay về menu</a> <br>";
            die();
        }
        require("SampleForm.php");
    ?>

    
    <section class="loai_do_an">
        <!-- Thêm -->
        <h3 class="green_h3">Thêm loại đồ ăn</h3>
        <form action="ThemLoaiDoAn.php" method="get" class="input_form" onsubmit="return CheckThemLoaiDoAn()">
            <span>Nhập tên loại đồ ăn mới:</span> 
            <input type="text" id="them_loai_do_an" placeholder="Nhập mới" name ="ten_loai_do_an">
            <input type="submit" value="Thêm loại đồ ăn">
        </form>
        <br> <br>

        <!-- Sửa -->
        <h3 class="yellow_h3">Sửa loại đồ ăn</h3>
        <form action="SuaLoaiDoAn.php" method="get" class="input_form" onsubmit="return CheckSuaLoaiDoAn()">
            <span>Chọn loại đồ ăn cần sửa:</span>
            <select name="ten_loai_do_an_cu">
                <?php
                require "Connect.php";
                $select = "SELECT * FROM loai_do_an";
                $result = $connect->query($select);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $ten_loai_do_an = $row['ten_loai_do_an'];
                        ?>
                        <option value="<?php echo $ten_loai_do_an ?>">
                            <?php echo $ten_loai_do_an ?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
            <br><br>
            <span>Nhập loại đồ ăn mới:</span>
            <input type="text" placeholder="Nhập mới" id="sua_loai_do_an" name="ten_loai_do_an_moi">
            <input type="submit" value="Sửa loại đồ ăn">
        </form>

        <br> <br>

        <!-- Xóa -->
        <h3 class="red_h3">Xóa loại đồ ăn</h3>
        <form action="XoaLoaiDoAn.php" method="get" class="input_form" onsubmit="return CheckXoaLoaiDoAn()">
        <span>Chọn loại đồ ăn cần xóa:</span> 
        <select name="ten_loai_do_an_xoa">
            <?php
                require "Connect.php";
                $select = "SELECT * FROM loai_do_an";
                $result = $connect->query("$select");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $ten_loai_do_an = $row['ten_loai_do_an'];
                    ?>
                    <option value="<?php echo $ten_loai_do_an ?>">
                    <?php echo $ten_loai_do_an ?>
                    </option>
                    <?php
                    }
                } 
                ?>
            </select>
            <input type="submit" value="Xóa loại đồ ăn">
        </form>

    </section>
</div>
</body>
</html>