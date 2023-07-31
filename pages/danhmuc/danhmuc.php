<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    .danhmuc{
        height: 50%;
    }
    .danhmuc p{
       text-align: center;
    }
    .danhmuc li{
        display: block;
        list-style: none;
    }
    .danhmuc a{
        text-decoration: none;
        color: black;
    }
</style>
<body>
    <div class="danhmuc">
        <p style="border-bottom: 1px solid #e0e0d1;padding:10px
">Danh Mục Sản Phẩm </p>
            <ul>
                <?php
                require_once("../mvc/model/connect.php");
                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc ASC";
                $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                while ($row = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row["tendanhmuc"] ?></a>
                </li>
                    <?php
                }
                ?>

            </ul>

    </div>
</body>

</html>