<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh Mục Sản Phẩm</title>
</head>

<body>
    <?php

    $sql = "SELECT * FROM sanpham where id_sp = $_GET[id_sp] limit 1 ";
    $query = mysqli_query($conn, $sql);
    ?>
    <form action="quanlysanpham/xuly.php?id_sp=<?php echo $_GET['id_sp']; ?>" method="post"
        enctype="multipart/form-data">
        <table border="1" style="border-collapse;">
            <tr>
                <th colspan="2">Sửa Sản Phẩm</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>
                        <input value="<?php echo $row['masp']; ?>" type="text" name="masanpham">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh sản phẩm</td>
                    <td>
                        <input type="file" name="hinhanh">
                        <img width="150px" height="auto" src="quanlysanpham/uploads/<?php echo $row['hinhanh']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input value="<?php echo $row['tensp']; ?>" type="text" name="tensanpham">
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>
                        <input value="<?php echo $row['giasp']; ?>" type="text" name="giasanpham">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng sản phẩm</td>
                    <td>
                        <input value="<?php echo $row['sl']; ?>" type="text" name="soluong">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        <input value="<?php echo $row['noidung']; ?>" type="text" name="noidung">
                    </td>
                </tr>
                <tr>
                    <td>Danh mục sản phẩm</td>
                    <td>
                        <select name="danhmuc">
                            <?php
                            $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc ASC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_danhmuc']==$row["id_danhmuc"]) {
                                    ?>
                                    <option selected value="<?php echo $row_danhmuc['id_danhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="<?php echo $row_danhmuc['id_danhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tình trạng</td>
                    <td>
                        <select name="tinhtrang">
                            <?php
                            if ($row['tinhtrang'] == 1) {

                                ?>
                                <option value="1">Kích hoạt</option>
                                <option value="0">Ẩn</option>
                                <?php
                            } else {
                                ?>
                                <option value="1">Kích hoạt</option>
                                <option value="0" selected>Ẩn</option>
                                <?php
                            } ?>
                        </select>
                    </td>
                </tr>

            </table>
            <button type="submit" name="suasanpham">Sửa</button>
            <?php
            }
            ?>
    </form>
</body>

</html>