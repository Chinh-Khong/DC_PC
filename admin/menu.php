  
    <?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
    header('location:login.php');
}
?>
<ul class="list_admin">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=baiviet&query=them">Quản lý bài viết</a></li>
    <li><a href="index.php?action=danhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
 
<li><a href="index.php?dangxuat=1">Đăng xuất:
        <?php
        if (isset($_SESSION['dangnhap'])) {
            echo $_SESSION['dangnhap'];
        }
        ?>
    </a></li>
</ul>