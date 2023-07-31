<?php

$sql_chitietsp = "SELECT * FROM sanpham, danhmuc where sanpham.id_danhmuc = danhmuc.id_danhmuc and sanpham.id_sp = '$_GET[id]' limit 1 ";
$query_chitietsp = mysqli_query($conn, $sql_chitietsp);
$row_chitietsp = mysqli_fetch_array($query_chitietsp);
?>

<style>
    .product img {
        width: 45%;
    }

    .product form {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .info {
        text-align: center;
    }

    .muangay {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .muangay input {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
        border: none;
        color: white;
        transition: background-color 0.3s ease;
    }

    .muangay input:hover {
        background-color: #ff4000;
    }

    .muangay .themgiohang {
        border: 1px solid #ff0000;
        color: while;
        background-color: #d0011b;
    }

    .muangay .muangay {
        color: while;
        background-color: #d0011b;
    }

    @keyframes pulsate {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }

    .muangay .muangay {
        animation: pulsate 2s infinite;
    }

    .muangay a {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
        border: none;
        color: white;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .muangay a:hover {
        background-color: #ff4000;
    }

    .muangay .muangay {
        animation: pulsate 2s infinite;
    }
.muangay div{
margin-left: 214px;}
    @media screen and (max-width: 768px) {
        .product form {
            flex-direction: column;
            text-align: center;
        }

        .product img {
            width: 100%;
            height: auto;
        }

        .infor {
            text-align: center;
        }
    }
</style>


<h1 style="text-align: center">Chi tiết sản phẩm</h1>
<div class="product">
    <form action="../pages/content/themgiohang.php?id_sanpham=<?php echo $row_chitietsp['id_sp'] ?>" method="post">
        <img src="\DC_PC\admin\quanlysanpham\uploads/<?php echo $row_chitietsp['hinhanh']; ?>" alt="">
        <div class="info">
            <h4>Tên sản phẩm :
                <?php echo $row_chitietsp['tensp'] ?>
            </h4>
            <p>Giá sản phẩm :
                <?php echo number_format($row_chitietsp['giasp'], 0, ',', '.') . 'vnđ' ?>
            </p>
            <p>Nội Dung sản phẩm :
                <?php echo $row_chitietsp['noidung'] ?>
            </p>
            <!-- <p>Tình trạng sản phẩm :
                <?php echo $row_chitietsp['tinhtrang'] ?>
            </p> -->
            Mã danh mục sản phẩm :
            <?php echo $row_chitietsp['id_danhmuc'] ?>

            <div class="muangay">
                <div class="cart"><input name="themgiohang" type="submit" class="themgiohang" value="Thêm giỏ hàng"></div>
                <!-- <?php
                if (isset($_SESSION['dangnhap'])) {
                    ?>
                    <a id="muangay" class="muangay" href="index.php?quanly=dathang">Mua ngay</a>

                    <?php
                } else {
                    ?>
                    <a onclick="alert('Bạn hãy đăng nhập tài khoản để mua hàng nhé!')" id="muangay" class="muangay"
                        href="index.php?quanly=taikhoan">Mua ngay</a>
                    <?php
                }
                ?> -->
            </div>
        </div>
    </form>
</div>