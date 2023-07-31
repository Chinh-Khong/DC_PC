<?php
//    Kiểm tra xem phiên làm việc có thông tin id_kh hay không
if (!isset($_SESSION['id_kh'])) {
    // Xử lý khi không có thông tin id_kh
    echo "Thiếu thông tin id_kh";
    exit;
}
$sp_query = "SELECT * FROM sanpham";
$result_sp = mysqli_query($conn, $sp_query);
// Lấy thông tin id_kh
$id_kh = $_SESSION['id_kh'];
$id_sp = $_SESSION['id_sp'];

$sp_query = "SELECT * FROM sanpham";
$result_sp = mysqli_query($conn, $sp_query);
// Tạo mã hóa đơn ngẫu nhiên
$mahd = rand(0, 9999);
// Chuẩn bị truy vấn lấy thông tin sản phẩm
// Kiểm tra lỗi truy vấn
if (!$result_sp) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
// Tính giá sản phẩm
$total_price = 0;
while ($row = mysqli_fetch_assoc($result_sp)) {
    $total_price += $row['giasp'] * $row['sl'];
}
// Thêm hóa đơn vào bảng hoadon
$insert_hd_query = "INSERT INTO hoadon (id_kh,id_sp, mahd, trangthai) VALUES ('$id_kh','$id_sp', '$mahd', '1')";
$result_hd = mysqli_query($conn, $insert_hd_query);

// Kiểm tra lỗi truy vấn
if ($result_hd) {
    foreach ($_SESSION['cart'] as $value) {
        $id_sp = mysqli_real_escape_string($conn, $value['id_sp']);
        $soluong = (int) $value['soluong'];
        // Chèn dữ liệu vào bảng chitiet_hoadon
        $insert_chitiethd_query = "INSERT INTO chitiet_hoadon (mahd, id_sp, soluong) VALUES ('$mahd', '$id_sp', '$soluong')";
        mysqli_query($conn, $insert_chitiethd_query);
    }
} else {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
// Đóng kết nối
mysqli_close($conn);

// Xóa giỏ hàng
unset($_SESSION['cart']);

// Chuyển hướng người dùng đến trang cảm ơn
header("Location: index.php?quanly=camon");
exit;
?>