<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
</head>
<style>
    .main_show {
        width: 78%;
        height: auto;
        padding: 0px 10px;
    }
</style>

<body>
    <div class="main_show">

        <?php
        if (isset($_GET['quanly'])) {
            $count = $_GET['quanly'];
        } else {
            $count = "";
        }
        if ($count == "sanpham") {
            include_once("content/sanpham.php");
        } elseif ($count == "gioithieu") {
            include_once("content/gioithieu.php");
        } elseif ($count == "lienhe") {
            include_once("content/lienhe.php");
        } elseif ($count == "chitietsanpham") {
            include_once("content/chitietsanpham.php");
        } elseif ($count == "themgiohang") {
            include_once("content/themgiohang.php");
        } elseif ($count == "giohang") {
            include_once("content/giohang.php");
        }elseif ($count == "taikhoan") {
            include_once("content/taikhoan.php");
        } elseif ($count == "dathang") {
            include_once("content/dathang.php");
        }  elseif ($count == "timkiem") {
            include_once("content/timkiem.php");
        } elseif ($count == "camon") {
            include_once("content/camon.php");
        } elseif ($count == "thongtincanhan") {
            include_once("content/thongtincanhan.php");
        } elseif ($count == "capnhat_profile") {
            include_once("content/capnhat_profile.php");
        }  
        elseif ($count == "xemdonhang") {
            include_once("content/xemdonhang.php");
        }elseif ($count == "muahang") {
            include_once("content/muahang.php");
        }elseif ($count == "lichsumuahang") {
            include_once("content/lichsumuahang.php");
        }
        else {
            include_once("index.php");
        }
        ?>
    </div>
</body>

</html>