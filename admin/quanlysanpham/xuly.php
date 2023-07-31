<?php
require_once("../../mvc/model/connect.php");
$masanpham = $_POST["masanpham"];
$tensanpham = $_POST["tensanpham"];
$giasanpham = $_POST["giasanpham"];
$soluong = $_POST["soluong"];
$noidung = $_POST["noidung"];
$tinhtrang = $_POST["tinhtrang"];
$danhmuc = $_POST["danhmuc"];
//xử lý để lấy file hình ảnh
$hinhanh = $_FILES["hinhanh"]['name'];
$hinhanh_tmp = $_FILES["hinhanh"]['tmp_name'];
//thêm sp  
if (isset($_POST["themsanpham"])) {
  $them = "INSERT INTO sanpham (masp,tensp,hinhanh,giasp,sl,noidung,tinhtrang,id_danhmuc) VALUES ('$masanpham','$tensanpham','$hinhanh','$giasanpham','$soluong','$noidung','$tinhtrang','$danhmuc') ";
  $query = mysqli_query($conn, $them);
  move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
  if ($query) {
    header("location:../index.php?action=quanlysanpham&query=them");
  } else {
    echo "Thêm sản phẩm không thành công";
  }
}
// sửa  sản phẩm
elseif (isset($_POST["suasanpham"])) {
  if ($hinhanh) {
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    $sql = "SELECT * FROM sanpham WHERE id_sp = '$_GET[id_sp]' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
      unlink('uploads/' . $row['hinhanh']);
    }

    $update = "UPDATE  sanpham SET masp = '$masanpham',hinhanh='$hinhanh', tensp = '$tensanpham',giasp = '$giasanpham',sl='$soluong',noidung = '$noidung',tinhtrang = '$tinhtrang',id_danhmuc = '$danhmuc' WHERE id_sp = '$_GET[id_sp]'";

  } else {
    $update = "UPDATE  sanpham SET masp = '$masanpham', tensp = '$tensanpham',giasp = '$giasanpham',sl='$soluong',noidung = '$noidung',tinhtrang = '$tinhtrang',id_danhmuc = '$danhmuc' WHERE id_sp = '$_GET[id_sp]'";

  }
  if (mysqli_query($conn, $update)) {
    header("location:../index.php?action=quanlysanpham&query=them");
  }
}
//xóa phẩm
elseif (isset($_GET["id_sp"])) {
  $id_sp = intval($_GET['id_sp']);
  $sql = "SELECT * FROM sanpham WHERE id_sp = '$id_sp' LIMIT 1";
  $query = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($query)) {
    unlink('uploads/' . $row['hinhanh']);
  }
  $xoa = "DELETE FROM sanpham WHERE id_sp = $id_sp";
  if (mysqli_query($conn, $xoa)) {
    header("location:../index.php?action=quanlysanpham&query=them");

  } else
    echo "xóa không thành công";
}

?>