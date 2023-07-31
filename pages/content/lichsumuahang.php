<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

h1 {
  color: #333333;
  text-align: center;
  margin: 20px 0;
}

.table-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background-color: #ffffff;
}

th,
td {
  padding: 10px;
  border: 1px solid #cccccc;
  text-align: center;
}

thead {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #ebebeb;
}

.error {
  color: red;
  font-style: italic;
  text-align: center;
  margin-top: 20px;
}

.login {
  text-align: center;
  margin-top: 20px;
}
.err{
  color: red;
  font-size: 18px;
  text-align: center;
}
</style>
<h1>Lịch sử đơn hàng</h1>
<?php
if (isset($_SESSION['dangnhap'])) {
// Kiểm tra xem phiên làm việc có thông tin id_kh hay không
if (isset($_SESSION['id_kh']) ) {
    $id_kh = $_SESSION['id_kh'];
    // Tạo câu truy vấn lấy thông tin đơn hàng
    $sql = "SELECT hoadon.mahd,chitiet_hoadon.soluong, sanpham.tensp, sanpham.giasp,sanpham.hinhanh, khachhang.tenkh, khachhang.sdt, khachhang.diachi FROM hoadon, khachhang, chitiet_hoadon, sanpham WHERE hoadon.id_kh = khachhang.id_kh AND hoadon.mahd = chitiet_hoadon.mahd AND chitiet_hoadon.id_sp = sanpham.id_sp AND hoadon.id_kh = '$id_kh' ORDER BY hoadon.mahd ASC";
    // $sql = "SELECT hoadon.mahd,sanpham.noidung, sanpham.tensp, sanpham.giasp,sanpham.hinhanh, khachhang.tenkh, khachhang.sdt, khachhang.diachi,chitiet_hoadon.soluong FROM hoadon, khachhang, sanpham,chitiet_hoadon WHERE hoadon.id_kh = khachhang.id_kh AND hoadon.id_sp = sanpham.id_sp AND chitiet_hoadon.mahd = hoadon.mahd  AND hoadon.id_kh = '$id_kh' ORDER BY hoadon.mahd DESC";

    $query = mysqli_query($conn, $sql);


    if (!$query) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($query) > 0) {
        $i = 0;
        echo "<table>";
        echo "<thead><tr>";
        echo "<th>Id</th>";
        echo "<th>Mã đơn hàng</th>";
        echo "<th>Hình ảnh</th>";
        echo "<th>Tên sản phẩm</th>";
        echo "<th>Giá sản phẩm</th>";
        echo "<th>Số lượng</th>";
        echo "<th>Tổng tiền</th>";
        echo "<th>Tên Khách hàng</th>";
        echo "<th>Số điện thoại</th>";
        echo "<th>Địa chỉ</th>";
        echo "<th>Quản lý</th>";
        echo "</tr></thead>";
        while ($row = mysqli_fetch_array($query)) {
            $i++;
            $tongtien = $row['soluong'] * $row['giasp'];
            ?>
            <img width="150px" height="auto" src="/admin/quanlysanpham/uploads/<?php echo $row['hinhanh']; ?>" alt="">
            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo $row['mahd']; ?>
                </td>
                <td> <img width="150px" height="auto" src="\DC_PC\admin\quanlysanpham\uploads/<?php echo $row['hinhanh']; ?>"
                        alt="">
                </td>
                <td>
                    <?php echo $row['tensp']; ?>
                </td>
          
                <td>
                    <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                </td>
                <td>
                    <?php echo $row['soluong']; ?>
                </td>
                <td>
                    <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
                </td>
                <td>
                    <?php echo $row['tenkh']; ?>
                </td>
                <td>
                    <?php echo "0" . $row['sdt']; ?>
                </td>
                <td>
                    <?php echo $row['diachi']; ?>
                </td>
                <form action="../content/xemdonhang.php" method="post">
                <td><a href="index.php?quanly=xemdonhang&mahd=<?php echo $row['mahd']; ?>">Xem đơn hàng</a></td>
                </form>
            </tr>
            <?php
        }
        ?>
        <?php
        echo "</table>";
    } else {
        echo "<p class='error'>Không tìm thấy hóa đơn nào cho khách hàng này.</p>";
    }

    mysqli_close($conn);
} else {
    echo "<p class='error'>Vui lòng đăng nhập để xem lịch sử đơn hàng.</p>";
}
}else{
  echo "<div class='err' >Vui lòng đăng nhập tài khoản
  <a href='index.php?quanly=taikhoan'>Đăng nhập ở đây</a></div>";
}
?>