<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .content {
        display: flex;
    }

    .danhmuc {
        border: 1px solid #99cc00;
        height: 600px;
        width: 20%;
    }

    .danhmuc ul li {
        border-bottom: 1px solid #e0e0d1;
        padding: 10px 5px;
    }

    .danhmuc ul li a {
        text-decoration: none;
    }

    .danhmuc a:hover {
        color: #00e600;
    }

    .sanpham {
        height: auto;
        width: 78%;
        margin-left: 5px;
    }

    /* responsive */
    @media screen and (max-width: 768px) {
        .content {
            flex-direction: left;
            text-align: center;
        }
    }
</style>

<body>
    <div class="wrapper">
        <div class="content">

            <?php
            require_once("danhmuc/danhmuc.php");

            require_once("content/content.php");
            ?>
        </div>
    </div>
</body>

</html>