<?php
session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping PC Hàng Đầu Việt Nam</title>
</head>

<style>
 
</style>

<body>

    <?php
    require_once('../mvc/model/connect.php');
    require_once("header.php");
    require_once("main_content.php");
    require_once("footer.php");
    ?>
</body>

</html>