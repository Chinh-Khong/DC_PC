<?php
$sql ='select * from sanpham, danhmuc where sanpham.id_danhmuc = danhmuc.id_danhmuc order by id_sp asc';
$query = mysqli_query($conn, $sql);

?>
<table border="1" style="border-collapse;">
  <tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng sản phẩm</th>
    <th>Nội dung</th>
    <th>Danh mục</th>
    <th>Tình trạng</th>
    <th colspan="2">Đề cập</th>
  </tr>

  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query)) {
    $i++;
    ?>
    <tr>
      <td>
        <?php echo $row['id_sp']; ?>
      </td>
      <td>
        <?php echo $row['masp']; ?>
      </td>
      
      <td>
        <img width="150px" height="auto" src="quanlysanpham/uploads/<?php echo $row['hinhanh']; ?>" />
      </td>
      <td>
        <?php echo $row['tensp']; ?>
      </td>
      <td>
        <?php echo $row['giasp']; ?>
      </td>
      <td>
        <?php echo $row['sl']; ?>
      </td>
      <td>
        <?php echo $row['noidung']; ?>
      </td>
      <td>
        <?php echo $row['tendanhmuc']; ?>
      </td>
      <td>
        <?php if ($row["tinhtrang"] == 1) {
          echo "Kích hoạt";
        } else
          echo "Ẩn"; ?>
      </td>
      <td><a href="quanlysanpham/xuly.php?id_sp=<?php echo $row['id_sp']; ?>"
          onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a></td>
      <td><a href="?action=quanlysanpham&query=sua&id_sp=<?php echo $row['id_sp']; ?>"
          onclick="return confirm('Bạn có chắc chắn muốn sửa sản phẩm này không?')">Sửa</a></td>
    </tr>

    <?php
  }
  ?>


</table>