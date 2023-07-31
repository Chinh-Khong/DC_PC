<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .wrapper {
            max-width: 1180px;
            margin: 0 auto;

        }

        .footer{
            margin-top: 15px;
        }
        .main-footer {
            display: flex;
        }

        @media screen and (max-width: 756px) {
            .main-footer {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="footer">
            <nav>

                <div class="main-footer">
                    <div class="address">
                        <img width="100px" height="100px" src="../slide/logo.jpg" alt="">
                        <p> Địa chỉ : Đồi Me - Yên Lập - Vĩnh Tường - Vĩnh Phúc <a style="color:#66ff66;"
                                href="https://www.google.com/maps/dir//THPT+Nguy%E1%BB%85n+Vi%E1%BA%BFt+Xu%C3%A2n,+%C4%90%E1%BA%A1i+%C4%90%E1%BB%93ng,+V%C4%A9nh+T%C6%B0%E1%BB%9Dng,+V%C4%A9nh+Ph%C3%BAc/@21.2748082,105.4758105,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3134f19c22e6e23d:0x24cee6016991a70a!2m2!1d105.5170101!2d21.2747332!3e0?hl=vi-VN&entry=ttu">(Xem
                                bản đồ)</a></p>
                        <p>FaceBook: <a style="color:#66ff66;"
                                href="https://www.facebook.com/profile.php?id=100078895160483">Chính
                                Khổng</a></p>
                        <p>Zalo: <a style="color:#66ff66;" href="">...</a></p>
                    </div>
                    <div class="lienhe">
                        <h4>Liên hệ</h4>
                        <p>Mr.Chính: 0915293944</p>
                        <p>Mr.Chính: 0915293944</p>
                    </div>
                    <div class="chinhsach">
                        <h4>Chính sách</h4>
                        <p><a href="">Chính sách bảo hành</a></p>
                        <p><a href="">Chính sách bảo mật thông tin</a></p>
                        <p><a href="">Chính sách đổi trả hàng</a> </p>
                        <p><a href="">Chính sách vận chuyển</a></p>
                    </div>
                    <div class="lamviec">
                        <h4>Cơ hội làm việc tại DC_PC</h4>
                        <p>Đẹp zai</p>
                        <p>Xinh gái</p>
                        <p>Ngon</p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>