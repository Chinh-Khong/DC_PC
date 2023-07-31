<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <style>
        .product {
            display: block;
            border: 1px solid blue;
        }

        .thongtin_sp span {
            margin: 40px;
            Font: Roboto, sans-serif;
            font-family: 20px;
        }

        .thongtin_sp del {
            margin-left: 20px;
            Color: #999999;
            Font: Roboto, sans-serif;
            font-family: 14px;
        }

        .thongtin_sp p {
            margin-left: 20px;
            font-weight: 600;
            font-family: 16px;
            color: #D70909;
            font-family: Roboto, sans-serif;
        }

        .row {
            max-width: 1225px;
        }

        .img {
            position: relative;
            overflow: hidden;
        }

        .MuaNgay a {
            text-decoration: none;
            color: white;
            background-color: #ef3340;
            max-width: 100%;
            display: block;
            padding: 10px 0px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            position: absolute;
            bottom: -45px;
            width: 100%;
            transition: 0.25s ease-in-out;
        }

        .img:hover .MuaNgay a {
            bottom: 0px;
        }

        .MuaNgay a:hover {
            background-color: #ff2f00;
        }

        #eye {
            position: absolute;

        }

        #eye i {
            color: 	rgb(128, 128, 128);
            font-size: 15px;
            font-weight: 600;
            margin-right: 10px;
            float: left;
        }
        .menu li{
            list-style: none;
        }
        .menu a {
            text-decoration: none;
        }  
    </style>
</head>

<body>
    <?php
    if (isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
    }
    ?>
    <?php
    $sql_sp = "SELECT * FROM sanpham,danhmuc WHERE  sanpham.id_danhmuc = danhmuc.id_danhmuc and tensp like '%" . $tukhoa . "%'";
    $query_sp = mysqli_query($conn, $sql_sp);
    ?>
    <div>Từ khóa tìm kiếm:
        <?php if (isset($tukhoa)) {
            echo $tukhoa;
        }else echo "ko tìm kiếm";
        ?>


    </div>

    <div class="row">
        <?php
        while ($row_sp = mysqli_fetch_array($query_sp)) {

            ?>
            <div class="col-md-3">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <div class="img">
                        <img width="100%" src="\DC_PC\admin\quanlysanpham\uploads/<?php echo $row_sp['hinhanh']; ?>" alt="">
                        <div class="MuaNgay">
                            <?php
                            if (isset($_SESSION['dangnhap'])) {
                                ?>
                                  <p class="dathang"><a href="index.php?quanly=chitietsanpham&id=<?php echo $row_sp['id_sp'] ?>">Xem sản phẩm</a></p>
                                <?php
                            } else {
                                ?>
                                    <p class="dathang"><a href="index.php?quanly=taikhoan">Xem sản phẩm</a></p>
                                    <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="thongtin_sp">
                        <div>
                            <?php echo $row_sp['tensp'] ?>
                        </div>
                        <p>
                            <?php echo number_format($row_sp['giasp'], 0, ',', '.') . 'vnđ' ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>