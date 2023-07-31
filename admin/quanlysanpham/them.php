<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>

<body>
    <form action="quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
        <table border="1" style="border-collapse;">
            <tr>
                <th colspan="2">Thêm Sản Phẩm</th>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td>
                    <input type="text" name="masanpham">
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="tensanpham">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="hinhanh">
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="text" name="giasanpham">
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td>
                    <input type="text" name="soluong">
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <textarea name="noidung" id="" cols="30" rows="10" style="resize: none"></textarea>
                </td>
            </tr>
            
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>

                    </select>
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
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="themsanpham">Thêm sản phẩm</button>
    </form>
</body>

</html>