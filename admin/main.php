<?php

if (isset($_GET['action']) && $_GET['query']) {
    $count = $_GET['action'];
    $query = $_GET['query'];
} else {
    $count = "";
    $query = "";
}
//quản lý danh mục sản phẩm
if ($count == "quanlydanhmucsanpham" && $query == 'them') {
    include_once("quanlydanhmucsanpham/them.php");
    include_once("quanlydanhmucsanpham/lietke.php");
} elseif ($count == "quanlydanhmucsanpham" && $query == 'sua') {
    include_once("quanlydanhmucsanpham/sua.php");
}
// quản lý sản phẩm
elseif ($count == "quanlysanpham" && $query == 'them') {
    include_once("quanlysanpham/them.php");
    include_once("quanlysanpham/lietke.php");
} elseif ($count == "quanlysanpham" && $query == 'sua') {
    include_once("quanlysanpham/sua.php");
}
// elseif ($count == "dangxuat" && $query == 'dangxuat') {
//     include_once("dangxuat.php");
// }
else {
    include_once("index.php");
}

?>