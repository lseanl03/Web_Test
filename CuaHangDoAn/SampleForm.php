<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Style.css">
    <script src="JavaScript.js"></script>
    <title>Document</title>
</head>
<body>
<aside class="sidebar">
        <div class ="title">
            <span><i class="bi bi-shop"></i><h4>Cửa hàng đồ ăn</h4></span>
            <?php
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['user_name'])){
                echo '<h4>xin chào ' . $_SESSION['user_name'] . '</h4>';
            }
            else{
                echo "<h5></h5>";
            }
            ?>
        </div>
        <ul>
            <li>
            <a href="Menu.php">
                <span class="sidebar-icon"><i class="bi bi-house"></i></span>
                <span class="sidebar-text">Menu</span>
            </a>                      
            </li>
            <li>
                <a href="DoAn.php">
                    <span class="sidebar-icon"><i class="bi bi-plus-circle"></i></span>
                    <span class="sidebar-text">Quản lý đồ ăn</span>
                </a>                      
            </li>
            <li>
                <a href="LoaiDoAn.php">
                    <span class="sidebar-icon"><i class="bi bi-plus-square"></i></span>
                    <span class="sidebar-text">Quản lý loại đồ ăn</span>
                </a>                      
            </li>
            <li>
                <a href="DatDoAn.php">
                    <span class="sidebar-icon"><i class="bi bi-basket"></i></span>
                    <span class="sidebar-text">Đặt đồ ăn</span>
                </a>                      
            </li>
            <li>
                <a href="ThanhToanDoAn.php">
                    <span class="sidebar-icon"><i class="bi bi-cash-coin"></i></span>
                    <span class="sidebar-text">Thanh toán đồ ăn</span>
                </a>                      
            </li>
            <li>
                <a href="TimKiemDoAn.php">
                    <span class="sidebar-icon"><i class="bi bi-search"></i></span>
                    <span class="sidebar-text">Tìm kiếm đồ ăn</span>
                </a>                      
            </li>
            <?php
                if(!isset($_SESSION['user_name'])){
                    echo "<li class ='log'>
                            <a href='DangNhap.html'>
                                <span class='sidebar-icon'><i class='bi bi-person'></i></span>
                                <Span class='sidebar-text'>Đăng nhập</Span>
                            </a>
                        </li>";
                }
                else{
                    echo "<li class ='log'>
                            <a href='DangXuat.php'>
                                <span class='sidebar-icon'><i class='bi bi-person'></i></span>
                                <Span class='sidebar-text'>Đăng xuất</Span>
                            </a>
                        </li>";
                }
            ?>
        </ul>
    </aside>
</body>
</html>