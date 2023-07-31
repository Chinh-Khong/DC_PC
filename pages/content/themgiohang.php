<?php
session_start();
require_once("../../mvc/model/connect.php");
//xóa sản phẩm

if (isset($_POST['xoa'])) {
    $index = $_POST['cart_item_index'];
    // Xóa sản phẩm từ giỏ hàng
    unset($_SESSION['cart'][$index]);
    // Cập nhật lại tổng tiền
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
        $tongtien += $cart_item['giasp'] * $cart_item['soluong'];
    }
    header('location:../index.php?quanly=giohang');
}

//tăng số lượng sản phẩm
if (isset($_POST['tang_sl'])) {
    $index = $_POST['cart_item_index'];

    // Tăng số lượng sản phẩm
    $_SESSION['cart'][$index]['soluong']++;
    // kiểm tra nếu số lượng nhỏ hơn 1 thì đặt lại thành 1 
    if ($_SESSION['cart'][$index]['soluong'] < 1) {
        $_SESSION['cart'][$index]['soluong'] = 1;
        echo "<script>alert('Số lượng không được nhỏ hơn 1.')</script>";
    }
    // Cập nhật lại tổng tiền
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
        $tongtien += $cart_item['giasp'] * $cart_item['soluong'];
    }
    header('location:../index.php?quanly=giohang');

}
//giảm số lượng sản phẩm
if (isset($_POST['giam_sl'])) {
    $index = $_POST['cart_item_index'];
    //gairm số lượng sản phẩm
    $_SESSION['cart'][$index]['soluong']--;
    // kiểm tra nếu số lượng nhỏ hơn 1 thì đặt lại thành 1 
    if ($_SESSION['cart'][$index]['soluong'] < 1) {
        $_SESSION['cart'][$index]['soluong'] = 1;
        echo "<script>alert('Số lượng không được nhỏ hơn 1.')</script>";
    }
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
        $tongtien += $cart_item['giasp'] * $cart_item['soluong'];
    }
    header('location:../index.php?quanly=giohang');

}
if ($cart_item['soluong'] <= 0 && $tongtien <= 0) {
    $tongtien = 0;
}


if (isset($_POST["themgiohang"])) {
    // session_destroy();
    $productID = $_GET['id_sanpham'];
    // Sử dụng Prepared Statements để ngăn chặn SQL injection
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_sp = ?");
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $new_product = $result->fetch_assoc();
        $category = $new_product['id_sp'];
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            $productExists = false;
            foreach ($cart as &$product) {
                if ($product['id_sp'] == $category) {
                    $product['soluong'] += 1;
                    $productExists = true;
                    break;
                }
            }
            unset($product);

            if (!$productExists) {
                $new_product['soluong'] = 1;
                $cart[] = $new_product;
            }
            $_SESSION["cart"] = $cart;
        } else {
            $new_product['soluong'] = 1;
            $_SESSION["cart"] = array($new_product);
        }
        // $id_sp = $_SESSION['id_sp'];
        // // Thêm dữ liệu vào bảng giỏ hàng
        // $insert_giohang = $conn->prepare("INSERT into giohang (id_sp,id_kh,soluong) values ('$id_sp','id_kh','$soluong')");
        // $insert_giohang->bind_param("ii", $category, $new_product['soluong']);
        // $insert_giohang->execute();
        // header("Location:../index.php?quanly=giohang");
        header('location:../index.php?quanly=giohang');
        exit();
    } else {
        echo "Sản phẩm trống";
    }
}

// if(isset($_SESSION['themgiohang'])){
//     // $id_sp = $_GET['id_sanpham'];
//     // $id_sp = $_SESSION['id_sp'];
//     foreach ($_SESSION['cart'] as $value) {
//         $id_kh = mysqli_real_escape_string($conn, $value['id_kh']);
//         $id_sp = mysqli_real_escape_string($conn, $value['id_sp']);
//         $soluong = (int) $value['soluong'];
//         // Chèn dữ liệu vào bảng chitiet_hoadon
//         $insert_giohang = "INSERT into giohang (id_sp,id_kh,soluong) values ('$id_sp','id_kh','$soluong')";
//         $ok =  mysqli_query($conn, $insert_giohang);
//         if ($ok) {
//            echo "Thêm giỏ hàng thành công";
//         }
//         else{
//             echo "thêm lo thành công";
//         }
//     }
// }
// $conn->close();
// ?>