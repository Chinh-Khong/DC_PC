<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel {
            position: unset !important;
        }

        .slide .aa img {
            height: 500px;
            margin-top: 20px;
        }

        .btnslide {
            margin-top: 100px;
        }

        .carousel-item {
            width: 100%;
        }

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

        .trang {
            text-align: center;

        }

        .trang a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            padding: 0px 5px;
        }

        .trang a:hover {
            color: #ff8000;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
  
    <?php
    //  Xác định tổng số sản phẩm
    $sql_total = "SELECT COUNT(*) AS total FROM sanpham";
    $result_total = mysqli_query($conn, $sql_total);
    $row_total = mysqli_fetch_assoc($result_total);
    $total = $row_total['total'];

    // Xác định số trang và trang hiện tại
    $per_page = 16;
    $total_pages = ceil($total / $per_page);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Xây dựng câu truy vấn lấy sản phẩm trên từng trang
    $start = ($current_page - 1) * $per_page;
    $sql_sp = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc LIMIT $start, $per_page";
    $query_sp = mysqli_query($conn, $sql_sp);
    ?>
<div>
</div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../slide/pc/02.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../slide/pc/01.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../slide/pc/03.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../slide/pc/04.jpg" alt="4 slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Display the carousel -->

    <div class="row">
        <?php
      //lấy id_khách hàng
      $sql_kh = "select * from khachhang";
      $query_kh = mysqli_query($conn,$sql_kh);
      $row_kh = mysqli_fetch_array($query_kh);
        while ($row_sp = mysqli_fetch_array($query_sp)) {
            ?>
            <!-- Display the product items -->
            <div class="col-md-3">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <div class="img">
                        <!-- <a id="eye" href="index.php?quanly=chitietsanpham&id=<?php echo $row_sp['id_sp']; ?>"><i
                                class="fa-solid fa-eye"></i></a> -->
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
                        <div style="text-align: center">
                            <?php echo $row_sp['tensp'] ?>
                        </div>
                        <p style="text-align: center">
                            <?php echo number_format($row_sp['giasp'], 0, ',', '.') . 'vnđ' ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="trang">
        <?php
        // Display pagination links
        
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<a href="index.php?page=' . $i . '">' . $i . '</a>';
        }
        ?>
    </div>
    <!-- Include JavaScript files at the end of the body tag -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php

mysqli_close($conn);
?>