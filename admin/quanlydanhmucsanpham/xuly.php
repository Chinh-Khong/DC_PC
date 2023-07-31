<?php
require_once("../../mvc/model/connect.php");

$tendanhmuc = $_POST["tendanhmuc"];
$thutu = $_POST["thutu"];
//thêm danh mục sp
if (isset($_POST["themdanhmucsanpham"])) {
  $them = "INSERT INTO danhmuc (tendanhmuc, thutu) VALUES ('$tendanhmuc','$thutu') ";
  $query = mysqli_query($conn, $them);
  if ($query) {
    header("location:../index.php?action=quanlydanhmucsanpham&query=them");
  }
}
// sửa danh mục sản phẩm
elseif (isset($_POST["suadanhmuc"])) {

  $update = "UPDATE danhmuc SET tendanhmuc='$tendanhmuc',thutu='$thutu' WHERE id_danhmuc=$_GET[id_danhmuc] ";
  if (mysqli_query($conn, $update)) {
    header("location:../index.php?action=quanlydanhmucsanpham&query=them");

  } else
    echo "sửa ko thành công";
}
//xóa danh mục sản phẩm
elseif (isset($_GET["id_danhmuc"])) {

  $id_danhmuc = intval($_GET['id_danhmuc']);
  $xoa = "DELETE FROM danhmuc WHERE id_danhmuc = $id_danhmuc";
  if (mysqli_query($conn, $xoa)) {
    header("location:../index.php?action=quanlydanhmucsanpham&query=them");

  }
}

?>