<!DOCTYPE html>
<html lang="en">
<head> 
</head>
<body onload ="OnLoadDoAn()">
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

    <section class="do_an">
        <!-- Thêm -->
        <h3 class="green_h3">Thêm đồ ăn</h3>
        <form action="ThemDoAn.php" method="get" class="input_form" onsubmit="return CheckThemDoAn()">
            <span>Chọn loại đồ ăn:</span> 
            <select name="ten_loai_do_an">
                <?php
                    require "Connect.php";
                    $select = "SELECT * FROM loai_do_an";
                    $result = $connect->query($select);
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
            <br> <br>
            <span>Nhập tên đồ ăn:</span> 
            <input type="text" id="them_do_an" placeholder=" Tên" name ="ten_do_an">
            <span>Nhập giá:</span> 
            <input type="text" id="them_do_an" placeholder=" Giá" name ="gia">
            <br> <br>
            <span>Nhập mô tả:</span> 
            <input type="text" id="them_do_an" placeholder=" Mô tả" name ="mo_ta">
            <input type="submit" value="Thêm đồ ăn">
        </form>
        <br> <br>

        <!-- Sửa -->
        <h3 class="yellow_h3">Sửa món ăn</h3>
        <form action="SuaDoAn.php" method="get" class="input_form" onsubmit="return CheckSuaDoAn()" >
            <span>Chọn đồ ăn cần sửa:</span> 
            <select name="ten_do_an_cu" onchange="UpdateValue()">
            <?php
                require "Connect.php";
                $select = "SELECT * FROM do_an";
                $result = $connect->query("$select");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){;
                        $ten_do_an = $row['ten_do_an'];
                    ?>
                    <option value="<?php echo $ten_do_an ?>">
                    <?php echo $ten_do_an ?>
                    </option>
                    <?php
                    }
                }
                ?>
            </select>
            <br> <br>
            <span>Nhập tên đồ ăn mới:</span> 
            <input type="text" id="them_do_an" placeholder=" Tên" name ="ten_do_an_moi">
            <span>Nhập giá mới:</span> 
            <input type="text" id="them_do_an" placeholder=" Giá" name ="gia_moi">
            <br> <br>
            <span>Nhập mô tả mới:</span> 
            <input type="text" id="them_do_an" placeholder=" Mô tả" name ="mo_ta_moi">
            <input type="submit" value="Sửa đồ ăn">
        </form>
        <br> <br>

        <!-- Xóa -->
        <h3 class="red_h3">Xóa món ăn</h3>
        <form action="XoaDoAn.php" method="get" class="input_form" onsubmit="return CheckXoaDoAn()">
        <span>Chọn đồ ăn cần xóa:</span> 
        <select name="ten_do_an_xoa">
            <?php
                require "Connect.php";
                $select = "SELECT * FROM do_an";
                $result = $connect->query("$select");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){;
                        $ten_do_an = $row['ten_do_an'];
                    ?>
                    <option value="<?php echo $ten_do_an ?>">
                    <?php echo $ten_do_an ?>
                    </option>
                    <?php
                    }
                } 
                ?>
            </select>
            <input type="submit" value="Xóa đồ ăn">
        </form>
    </section>
</div>
</body>
</html>