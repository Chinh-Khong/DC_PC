<?php
$sql = "SELECT * FROM danhmuc ORDER BY thutu ASC ";
$query = mysqli_query($conn, $sql);

?>
<table border="1" style="border-collapse;">
  <tr>
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Thứ tự</th>
    <th>Quản lí</th>
  </tr>

  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query)) {
    $i++;
    ?>
    <tr>
      <td>
        <?php echo $row['id_danhmuc']; ?>
      </td>

      <td>
        <?php echo $row['tendanhmuc']; ?>
      </td>
      <td>
        <?php echo $row['thutu']; ?>
      </td>
      <td><a href="quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $row['id_danhmuc']; ?>"
          onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</a></td>
          <td><a href="?action=quanlydanhmucsanpham&query=sua&id_danhmuc=<?php echo $row['id_danhmuc']; ?>"
          onclick="return confirm('Bạn có chắc chắn muốn sửa danh mục này không?')">Sửa</a></td>
    </tr>

    <?php
  }
  ?>


</table>