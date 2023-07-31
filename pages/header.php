<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC_PC.vn</title>
    <!-- <link rel="stylesheet" href="../css/header.css"> -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .wrapper {
        max-width: 1180px;
        margin: 0 auto;
    }

    .header {
        margin-top: 15px;
        display: flex;
    }

    .logo {
        flex: 1;
    }

    .menu {
        flex: 3;
    }

    .orther {
        flex: 1;

    }

    .toggle {
        text-align: center;
        padding: 10px;
        font-size: 20px;
        cursor: pointer;
        display: none;
    }

    .search {
        margin-top: 5px;
    }

    .search input[type="text"] {
        padding-left: 30px;
        /* tạo khoảng cách giữa hình ảnh và văn bản trong ô input */
        /* các thuộc tính khác */
        border-radius: 5px;
        background-color: #ffffff;
        /* màu trắng */
        border: 2px solid #74ef1c;
        /* màu xanh lá cây */
        box-shadow: 0px 2px 4px rgba(247, 203, 203, 0.3);
        /* thêm bóng */
        /* các thuộc tính khác */
    }

    .search input:hover {
        border: 2px solid #74ef1c;
        /* màu xanh lá cây */
        box-shadow: 0px 2px 99px rgba(247, 203, 203, 0.3);
        /* thêm bóng */

    }

    .search button {
        background-color: #74ef1c;
        ;
        color: #fff;
        border: none;
        box-shadow: none;
        padding: 11px 20px;
        border-radius: 4px;
    }

    .search input {
        padding: 10px 280px;
    }

    .search button:hover {
        border: none;
        background: #74ef1c;
        ;
    }

    .menu {
        display: flex;

    }

    .menu li {
        list-style: none;
        padding: 20px;
    }

    .menu a {
        text-decoration: none;
    }

    .main-menu li {
        padding: 20px;
    }

    .main-menu .menu li {
        padding: 10px;
        margin-top: 5px;
    }

    .main-menu a {
        display: block;
        font-weight: bold;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.2;
        position: relative;

    }

    .main-menu a::after {
        content: "";
        height: 5px;
        width: 0px;
        background: tomato;
        position: absolute;
        bottom: -7px;
        left: 0;
        transition: all 0.5s ease-in-out;
    }

    .main-menu a:hover::after {
        width: 100%;
    }

    .orther {
        margin-top: 18px;
    }

    .orther li {
        list-style: none;
    }

    .orther a {
        text-decoration: none;
        padding: 0px 5px;
    }

    .sp-2 {
        display: none;
        position: relative;

    }

    .main-menu li:hover .sp-2 {
        display: block;
    }
    .search{
        margin-left: 50px;
    }
    .menu .menu{
        margin-left: 20px;
    }
    .orther{
        margin-left: 100px;
    }


    /* responsive */
    @media screen and (max-width: 768px) {
        .header {
            flex-direction: column;
            text-align: center;
        }

        .toggle {
            display: block;
        }

        .main-menu {
            display: none;
        }

        .search button {
            display: none;
        }
    
    }
</style>
<!-- JQuery toggle về nav menu khi thu nhỏ màn hình  -->
<script>
    $(document).ready(function () {
        $('.toggle').click(function () {
            $('nav').slideToggle();
        })
    })
</script>
<?php
$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc ASC";
$query_danhmuc = mysqli_query($conn, $sql_danhmuc);
?>
<?php
   
   if (isset($_GET['dangxuat']) && $_GET['dangxuat']==1) {
       unset($_SESSION['dangnhap']);
       setcookie("username", "", time() - 3600);
       header("Location: index.php?quanly=taikhoan");
       exit();
   }
   ?>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo"><img width="100px" height="100px" src="../slide/logo.jpg" alt=""></div>
            <div class="toggle"><i class="fa-solid fa-bars"></i></div>
            <div class="menu">

                <nav class="main-menu">
                    <div class="search">
                        <form action="index.php?quanly=timkiem" method="POST">
                            <input id="tim" type="text" name="tukhoa" placeholder="Tìm kiếm">
                            <button type="submit" name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php">Trang Chủ</a></li>
                        <!-- <li><a href="index.php?quanly=sanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">Sản Phẩm <i
                                    style="color:#ffff66;" class="fa-solid fa-chevron-down"></i></a>
                            <ul class="sp-2">
                                <?php
                                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
                                    <li>
                                        <a href="index.php?quanly=sanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc["tendanhmuc"] ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li> -->
                        <li><a href="index.php?quanly=gioithieu">Giới Thiệu</a></li>
                        <li><a href="index.php?quanly=lienhe">Liên Hệ</a></li>

                        <?php
                        if (isset($_SESSION['dangnhap'])) {
                            ?>
                            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="index.php?quanly=taikhoan">Đăng nhập</a></li>
                            <?php
                        }
                        ?>
                        <!-- <li><a href="index.php?quanly=taikhoan&id=2">Tài Khoản</a></li> -->
                    </ul>
                </nav>
            </div>
            <div class="orther">
                <a href="index.php?quanly=giohang"> <i class="fa-solid fa-cart-shopping"></i></a>
                <a href="index.php?quanly=thongtincanhan"><i class="fa-solid fa-user"></i></a>
                <a href="index.php?quanly=kk"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </div>
</body>

</html>