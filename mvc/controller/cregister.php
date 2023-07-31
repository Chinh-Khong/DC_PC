<?php
    $tendangnhap = $matkhau = $nmatkhau = "";
    $tendangnhapEr = $matkhauEr = $nmatkhauEr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function test_input($data)
        {
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
       if (empty($_POST['tendangnhap'])) {
        $tendangnhapEr = "không dc để trống";
       }else{
        $tendangnhap = test_input($_POST['tendangnhap']);
       }
    }

?>