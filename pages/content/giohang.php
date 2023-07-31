<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>
<style>
    .soluong {
        border: none;
        background-color: white;
    }

    .quanly button {
        display: flex;
        border: 1px solid #9E9E9E;
        margin-bottom: 5px;
        padding: 5px 5px;
        width: 100px;
        display: block;
        text-align: center;
        border-radius: 10px;
        font-weight: 600;
        font-size: 18px;
    }

    .quanly p {
        display: flex;
        border: 1px solid #9E9E9E;
        margin-bottom: 5px;
        padding: 5px 5px;
        width: 100px;
        display: block;
        text-align: center;
        border-radius: 10px;
        font-weight: 600;
        font-size: 18px;
        background-color: #ef3340;
    }

    .quanly a {
        color: white;
        text-decoration: none;
        cursor: pointer;
        text-align: center;
    }

    .dathang a {
        text-decoration: none;
        color: black;
        font-size: 20px;
        margin-top: 5px;
    }

    .dathang a:hover {
        color: #ff3300;
    }
    .quanly button{
        border: none;
    }
    
    .ls a {
        color: black;
        font-size: 18px;
        text-decoration: none;
    }
    .ls a:hover{
        color: 	rgb(255, 128, 0);
    }
</style>

<body>
    <p class="ls">
    <a href="index.php?quanly=lichsumuahang">Lịch sử mua hàng</a></p>
    <div class="container">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Số tiền</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart'])) {
                    $i = 0;
                    $tongtien = 0;

                    foreach ($_SESSION['cart'] as $index => $cart_item) {
                        $i++;
                        $thanhtien = $cart_item['giasp'] * $cart_item['soluong'];
                        $tongtien += $thanhtien;
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $cart_item['masp']; ?>
                            </td>
                            <td>
                                <img width="100px" height="auto"
                                    src="../admin/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo $cart_item['tensp']; ?>
                            </td>
                            <td>
                                <form action="content/themgiohang.php" method="post">
                                    <input type="hidden" name="cart_item_index" value="<?php echo $index; ?>">
                                    <button class="soluong" name="tang_sl"><i class="fa-solid fa-plus"></i></button>
                                </form>
                                <?php echo $cart_item['soluong']; ?>
                                <form action="content/themgiohang.php" method="post">
                                    <input type="hidden" name="cart_item_index" value="<?php echo $index; ?>">
                                    <button class="soluong" name="giam_sl"><i class="fa-solid fa-minus"></i></button>
                                </form>
                            </td>
                            <td>
                                <?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'vnđ' ?>
                            </td>
                            <td>
                                <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?>
                            </td>
                            <td class="quanly">
                                <form action="content/themgiohang.php" method="post">
                                    <input type="hidden" name="cart_item_index" value="<?php echo $index; ?>">
                                        <button onclick="confirm('Bạn có chắc chắn là muốn xóa sản phẩm ')" class="xoa" name="xoa">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                <tr>
                    <td style="text-align: center;" colspan="6">Tổng tiền :
                        <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="6">
                        <form action="" method="post">
                            <?php
                            if (isset($_SESSION['dangnhap'])) {
                                ?>
                                <p class="dathang"><a onclick="confirm('Nhấn OK để mua sản phẩm này ')" href="index.php?quanly=dathang">Đặt hàng</a></p>
                                <?php
                            } else {
                                ?>
                                    <p class="dathang"><a href="index.php?quanly=taikhoan">Đăng nhập để đặt hàng</a></p>
                                    <?php
                            }
                            ?>
                        </form>
                    </td>
                </tr>
                <?php

                } else {
                    ?>
                    <tr>
                        <td style="text-align: center;" colspan="6">Hiện tại giỏ hàng trống</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>