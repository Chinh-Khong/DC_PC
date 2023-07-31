<!-- <?php
$mahd = $_GET['mahd'];

// Kiểm tra nếu mahd chưa được truyền
if (!isset($mahd)) {
    echo "Vui lòng cung cấp mã đơn hàng";
    exit;
}

// Kết nối cơ sở dữ liệu (thay đổi thông tin kết nối của bạn)
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

$sql = "SELECT * FROM chitiet_hoadon
        INNER JOIN sanpham ON chitiet_hoadon.id_sp = sanpham.id_sp
        WHERE chitiet_hoadon.mahd = '$mahd'
        ORDER BY chitiet_hoadon.id_chitiethd DESC";

$query = mysqli_query($conn, $sql);

// Kiểm tra nếu không có bản ghi tương ứng với mahd
if (mysqli_num_rows($query) == 0) {
    echo "Không tìm thấy chi tiết hóa đơn cho mã đơn hàng $mahd";
    exit;
}
?>
<table style="width: 100%" border="1" style="border-collapse: collapse;">
    <tr>
        <td>Id</td>
        <td>Mã đơn hàng</td>
        <td>Hình ảnh</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá sản phẩm</td>
        <td>Tổng tiền</td>
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($query)) {
        $i++;
        $thanhtien = $row['giasp'];
        $tongtien = $row['giasp'] * $row['sl'];
        $hinhanh = str_replace("\\", "/", $row['hinhanh']); // Thay đổi dấu gạch chéo ngược thành gạch chéo xuống
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['mahd']; ?></td>
            <td>        <img width="150px" height="auto" src="\DC_PC\admin\quanlysanpham\uploads/<?php echo $row['hinhanh']; ?>" alt="">
</td>
            <td><?php echo $row['tensp']; ?></td>
            <td><?php echo $row['sl']; ?></td>
            <td><?php echo $row['giasp']; ?></td>
            <td><?php echo $tongtien; ?></td>
        </tr>
    <?php
    }
    ?>

</table> -->

<?php
$mahd = $_GET['mahd'];
if (!isset($mahd)) {
    echo "Vui lòng cung cấp mã đơn hàng";
    exit();
}
$sql = "SELECT * from chitiet_hoadon , sanpham where chitiet_hoadon.id_sp = sanpham.id_sp and chitiet_hoadon.mahd = '$mahd' order by chitiet_hoadon.id_chitiethd DESC";
// $sql = "SELECT * FROM chitiet_hoadon
//         INNER JOIN sanpham ON chitiet_hoadon.id_sp = sanpham.id_sp
//         WHERE chitiet_hoadon.mahd = '$mahd'
//         ORDER BY chitiet_hoadon.id_chitiethd DESC";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) == 0) {
    echo "Không tìm thấy chi tiết hóa đơn cho mã đơn hàng $mahd";
    exit;
}
?>
<div>
    <?php
    $row = mysqli_fetch_array($query);
    $tongtien = 0;
    $tongtien = $row['giasp'] * $row['soluong'];
    ?>
</div>
<style>
    table {
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table th {
  text-align: left;
  background-color: #f2f2f2;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #ddd;
}

table img {
  width: 150px;
  height: auto;
}

h2 {
  font-size: 24px;
  color: #333;
}

p {
  font-size: 16px;
  color: #666;
}
</style>
<table border="1" style="width: 100%, border-collapse: collapse">
    <tr>
        <td>Mã đơn hàng</td>
        <td>Hình ảnh</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá sản phẩm</td>
        <td>Nội dung</td>
        <td>Tổng tiền</td>
        <td>Quản lý</td>
    </tr>
    <tr>
        <td>
            <?php echo $row['mahd'] ?>
        </td>
        <td>
            <img width="250px" height="auto" src="\DC_PC\admin\quanlysanpham\uploads/<?php echo $row['hinhanh']; ?>"
                alt="">
        </td>
        <td>
            <?php echo $row['tensp'] ?>
        </td>
        <td>
            <?php echo $row['soluong'] ?>
        </td>
        <td>
            <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
        </td>
        <td>
            <?php echo $row['noidung'] ?>
        </td>
        <td>
            <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
        </td>
        <td>
            <a onclick="return confirm('Bạn muốn tiếp tục mua sản phẩm bên chúng tôi ???')" id="muangay" class="muangay"
                href="index.php?quanly=dathang">Mua ngay</a>
        </td>
    </tr>
</table>