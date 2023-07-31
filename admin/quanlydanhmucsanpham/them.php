<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục Sản Phẩm</title>
</head>

<body>
    <form action="quanlydanhmucsanpham/xuly.php" method="post">
        <table border="1" style="border-collapse;">
            <tr>
                <th colspan="2">Thêm Danh Mục Sản Phẩm</th>
            </tr>
            <tr>
                <td>Tên danh mục</td>
                <td>
                    <input type="text" name="tendanhmuc">
                </td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td>
                    <input type="text" name="thutu">
                </td>
            </tr>
        </table>
        <button type="submit" name="themdanhmucsanpham">Thêm</button>
    </form>
</body>

</html>