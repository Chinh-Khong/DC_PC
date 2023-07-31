<!DOCTYPE html>
<html>
<head>
    <title>Hồ sơ cá nhân</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php

$id_kh = isset($_SESSION['id_kh']) ? $_SESSION['id_kh'] : null;
// Kiểm tra nếu session 'id_kh' không tồn tại, chuyển hướng về trang đăng nhập
if (!$id_kh) {
    header('Location: index.php?quanly=taikhoan');
    exit();
}

$update_success = false;

// Kiểm tra nếu có submit form
if (isset($_POST['chinhsua'])) {
    $hinhanh = $_FILES["hinhanh"]['name'];
    $hinhanh_tmp = $_FILES["hinhanh"]['tmp_name'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

    // Kiểm tra nếu có file hình ảnh được tải lên
    if ($hinhanh) {
        $avatar_dir = 'content/avatar/';
        // Di chuyển file hình ảnh vào thư mục 'avatar/' và lưu tên file vào biến $hinhanh
        move_uploaded_file($hinhanh_tmp, $avatar_dir . $hinhanh);

        // Xóa file hình ảnh cũ
        $select_avatar_sql = "SELECT hinhanh FROM khachhang WHERE id_kh = '$id_kh' LIMIT 1";
        $select_avatar_query = mysqli_query($conn, $select_avatar_sql);
        if ($select_avatar_query && mysqli_num_rows($select_avatar_query) > 0) {
            $row = mysqli_fetch_assoc($select_avatar_query);
            $old_avatar = $avatar_dir . $row['hinhanh'];
            if (file_exists($old_avatar)) {
                unlink($old_avatar);
            }
        }
    }

    // Cập nhật thông tin cá nhân vào cơ sở dữ liệu
    $update_sql = "UPDATE khachhang SET 
                    hinhanh = '$hinhanh',
                    tenkh = '$ten',
                    email = '$email',
                    matkhau = '$matkhau',
                    sdt = '$sdt',
                    diachi = '$diachi'
                    WHERE id_kh = '$id_kh'";
    $update_query = mysqli_query($conn, $update_sql);
    if ($update_query) {
       header("location:index.php?quanly=thongtincanhan");
    } else {
        die("Lỗi khi cập nhật thông tin người dùng: " . mysqli_error($conn));
    }
}

// Lấy thông tin cá nhân từ cơ sở dữ liệu
$select_sql = "SELECT * FROM khachhang WHERE id_kh = '$id_kh' LIMIT 1";
$select_query = mysqli_query($conn, $select_sql);
if ($select_query && mysqli_num_rows($select_query) > 0) {
    $kh = mysqli_fetch_assoc($select_query);
} else {
    die("Không tìm thấy thông tin người dùng");
}
?>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="panel-heading">
                    <h2 class="text-center">Hồ sơ cá nhân: <?php echo $kh['tenkh'] ?></h2>
                </div>
                <div class="panel-body">
                    <?php if ($update_success) : ?>
                        <div class="alert alert-success">Cập nhật thông tin thành công</div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <img width="450px" height="auto" src="content/avatar/<?php echo $kh['hinhanh']; ?>" />

                        <input type="file" name="hinhanh">
                    </div>
                    <div class="form-group">
                        <label for="">Tên người dùng:</label>
                        <input value="<?php echo $kh['tenkh']; ?>" placeholder="Họ và tên" name="ten" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input value="<?php echo $kh['email']; ?>" placeholder="Email" name="email" type="text"
                            class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu:</label>
                        <input value="<?php echo $kh['matkhau']; ?>" placeholder="Mật khẩu" name="matkhau" type="text"
                            class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại:</label>
                        <input value="<?php echo $kh['sdt']; ?>" placeholder="Số điện thoại" name="sdt" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ:</label>
                        <input value="<?php echo $kh['diachi']; ?>" placeholder="Địa chỉ" name="diachi" type="text"
                            class="form-control">
                    </div>
                    <button name="chinhsua" class="btn btn-success">Chỉnh sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>