<?php require_once("../mvc/model/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/taikhoan.css">
    <style>
        .menu li{
            list-style: none;
        }
        .menu a {
            text-decoration: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.login-info-box').fadeOut();
            $('.login-show').addClass('show-log-panel');
        });

        $(document).on('change', '.login-reg-panel input[type="radio"]', function () {
            if ($('#log-login-show').is(':checked')) {
                $('.register-info-box').fadeOut();
                $('.login-info-box').fadeIn();

                $('.white-panel').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');

            }
            else if ($('#log-reg-show').is(':checked')) {
                $('.register-info-box').fadeIn();
                $('.login-info-box').fadeOut();

                $('.white-panel').removeClass('right-log');

                $('.login-show').addClass('show-log-panel');
                $('.register-show').removeClass('show-log-panel');
            }
        });

    </script>
</head>
<?php

if (isset($_POST['dangki'])) {
    $hovaten = $_POST['hovaten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $nmatkhau = $_POST['nmatkhau'];
    if (empty($hovaten)) {
        echo "<script> alert('Họ và tên không được trống'); </script>";
    } elseif (empty($email)) {
        echo "<script> alert('email không được trống'); </script>";
    } elseif (empty($matkhau)) {
        echo "<script> alert('Tên đăng nhập không được trống'); </script>";
    } elseif ($matkhau != $nmatkhau) {
        echo "<script> alert('Mật khẩu không trùng khớp'); </script>";
   
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Hãy nhập đúng định dạng VD: email@gmail.com'); </script>";
    } elseif (!preg_match('@[A-Z]@', $matkhau) || !preg_match('@[a-z]@', $matkhau) || !preg_match('@[0-9]@', $matkhau) || !preg_match('@[^\w]@', $matkhau)) {
        echo "<script> alert('Mật khẩu phải dài ít nhất 8 ký tự và phải bao gồm ít nhất một chữ cái viết hoa, một số và một ký tự đặc biệt.'); </script>";
    } else {
        $check = "SELECT  * from khachhang where email = '$email'";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('email đã tồn tại'); </script>";
        } else {
            $sql = "INSERT into khachhang (tenkh,email,sdt,diachi,matkhau) value('$hovaten','$email','','','$matkhau')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script> alert('Đăng kí thành công'); </script>";

            } else {
                echo "<h1>đăng kí khôg thành công</h1>";
            }
        }
    }
}
//login
?>
<?php

// Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" chưa
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];

    // Đoạn mã kiểm tra email và mật khẩu trong cơ sở dữ liệu
    $check = "SELECT * from khachhang where email = '$email' and matkhau = '$matkhau' limit 1";
    $result = mysqli_query($conn, $check);
    $count = mysqli_num_rows($result);
    // Kiểm tra số hàng trả về từ câu truy vấn
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['dangnhap'] = $row['tenkh'];
        $_SESSION['id_kh'] = $row['id_kh'];

        // Nếu tìm thấy khớp, cho phép người dùng vào trang chủ
        header('location:index.php');
        ob_end_flush();
        exit;
    } else {
        // Nếu không khớp, in ra thông báo
        echo "<script> alert('Sai tài khoản hoặc mật khẩu'); </script>";
    }
}

?>



<style>
    .submit {
        text-transform: uppercase;
        padding: 10px 30px;
        float: right;
        border-radius: 30px;
        border: none;
        background-color: #444444;
        color: #f9f9f9;
    }
</style>

<body>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Bạn đã có tài khoản?</h2>
            <p>Chào mừng bạn đã đến với DC_PC chúng tôi</p>
            <label id="label-register" for="log-reg-show">Đăng nhập</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>
        <div class="register-info-box">
            <h2>Bạn chưa có tài khoản?</h2>
            <p>Chào mừng bạn đã đến với DC_PC chúng tôi</p>
            <label id="label-login" for="log-login-show">Đăng kí</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>
        <div class="white-panel">
            <div class="login-show">
                <h2>Đăng nhập</h2>
                <form action="" method="post">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="matkhau" placeholder="Mật khẩu">
                    <button class="submit" name="dangnhap" type="submit">đăngnhập</button>
                    <a href="">Quên mật khẩu ?</a>
                </form>
            </div>

            <div class="register-show">
                <h2>Đăng kí</h2>
                <form action="" method="post">
                    <input name="hovaten" type="text" placeholder="Họ và tên">
                    <input name="email" type="text" placeholder="Email">
                    <input name="matkhau" type="text" placeholder="Mật khẩu">
                    <input name="nmatkhau" type="text" placeholder="Nhập lại mật khẩu">
                    <button class="submit" type="submit" name="dangki">Đăng kí</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>