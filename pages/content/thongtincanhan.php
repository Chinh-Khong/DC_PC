<?php
    if (!isset($_SESSION['dangnhap'])) {
        header('location:index.php?quanly=taikhoan');
        exit();
    }
    $id_kh = $_SESSION['id_kh'];
    $sql = "SELECT * from khachhang where id_kh ='$id_kh'";
    $query = mysqli_query($conn,$sql);
    if ($query->num_rows > 0) {
        $kh = $query->fetch_array();
    }else{
        die("Không tìm thấy thông tin người dùng");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<style>
   
    .profile{
        margin-top: 20px;
        display: flex;
        text-align: content;
       
    }
    .infor{
        margin-left: 20px;
    }
    .infor a{
        font-size: 20px;
        text-decoration: none;
        color: black;
    }
    .infor a:hover{
        color: #ff8c1a;
    }
    @media screen and (max-width: 768px) {

        .profile{
            flex-direction: column;
            text-align: center;
        }
    }
</style>
<body>
    <h2 style="text-align: center;">Thông tin cá nhân: <?php echo $kh['tenkh'] ?></h2>
    <div class="profile">
    <img width="450px" height="auto" src="content/avatar/<?php echo $kh['hinhanh']; ?>" />
    <div class="infor">
    <p>Tên: <?php echo $kh['tenkh']; ?></p>
    <p>Email: <?php echo $kh['email']; ?></p>
    <p>Mật khẩu: <?php echo $kh['matkhau']; ?></p>
    <p>Số điện thoại: <?php echo "0". $kh['sdt']; ?></p>
    <p>Địa chỉ: <?php echo $kh['diachi']; ?></p>
    <a href="index.php?quanly=capnhat_profile">Chỉnh sửa</a>
    </div>
    </div>
</body>
</html>