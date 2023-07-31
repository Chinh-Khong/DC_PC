<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh Mục Sản Phẩm</title>
</head>

<body>
    <?php

    $sql = "SELECT * FROM danhmuc where id_danhmuc = $_GET[id_danhmuc] limit 1 ";
    $query = mysqli_query($conn, $sql);
    ?>
    <form action="quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $_GET['id_danhmuc']; ?>" method="post">
        <table border="1" style="border-collapse;">
            <tr>
                <th colspan="2">Sửa Danh Mục Sản Phẩm</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td>Tên danh mục</td>
                    <td>
                        <input value="<?php echo $row['tendanhmuc']; ?>" type="text" name="tendanhmuc">
                    </td>
                </tr>
                <tr>
                    <td>Thứ tự</td>
                    <td>
                        <input value="<?php echo $row['thutu']; ?>" type="text" name="thutu">
                    </td>
                </tr>
            </table>
            <button type="submit" name="suadanhmuc">Sửa</button>
            <?php
            }
            ?>
    </form>
</body>

</html>