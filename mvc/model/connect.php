<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dc_pc";
    $conn = new mysqli($severname,$username,$password,$dbname);
    if ($conn -> connect_error) {
        echo "Kết nối không thành công" .$conn->connect_error;
        exit();
    }
?>