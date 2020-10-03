<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Sản phẩm chi tiết</title>
    <style>
        .menu_top ul {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
        }

        .menu_top ul li {
            display: inline-block;
            padding-left: 10px;
        }

        .menu_top ul li a {
            font-size: 17px;
            font-weight: bold;
            transition: .2s;
            color: white;

        }

        .menu_top ul li a:hover {
            color: #ffc2b3;
            text-decoration: none;
            transition: .2s;
        }

        .cart {
            margin-top: 10px;
            margin-left: 20px;


        }

        .cart i {
            font-size: 20px;
            padding-left: 10px;
            color: white;

        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row" style="background-color:#ff5622 ; height : 125px">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <a href="home.php"><img src="./front_end/image/logo6.png" alt="" width="105px" style="margin-left: 40px; margin-top:10px; "></a>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <?php include "./search.php" ?>

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:38px ; font-size: 15px ; ">
                <nav class="menu_top">
                    <ul>
                        <li><a href="">Đăng nhập</a></li>
                        <li><a href="">Đăng kí</a></li>
                        <li><a href="">Quản trị</a></li>
                    </ul>
                </nav>
                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span style="font-weight: bold; color:white ; ">Giỏ hàng</span>
                </div>
            </div>


        </div>
        <div class="row" style="margin-top: 1px;">

            <?php include "./header.php" ?>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Balo nam</h3>

            </div>






        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!-- lấy ảnh từ csdl cho vào đây  , ảnh đại diện ;  -->
                <img src="./front_end/image/sp2.jpg" alt="" width="100%"> <br> <br>
                <h5>Mô tả</h5>

                <p>Balo Da Sinh Viên Phong Cách Hàn Quốc 2021 BL008 thời trang, trẻ trung năng động dành cho học sinh, sinh viên, du lịch, phượt và văn phòng.
                    Balo BL008 gồm 2 ngăn chính, 2 ngăn phụ phía trước.<br>

                    + Ngăn chính được thiết kế riêng cho các dòng mày laptop PC lên đến 15.6″ hoặc Mac 17″; và có không gian lớn để bạn mang sách, tập, tài liệu hay những đồ
                    dùng cá nhân như áo quần khi đi chơi hay du lịch; ngăn dây kéo trước được thiết kế giúp bạn mang gọn những phụ kiện như bóp ví, điện thoại, tại nghe, sổ tay… <br>

                </p>


            </div>
            <div class="col-xs-8 col-md-8 col-sm-8 col-lg-8">
                <!-- lấy tên sản phẩm từ csdl -->
                <h4>Balo da Hàn Quốc</h4>
                <!-- lấy giá sản phẩm từ csdl  -->
                <hr width="650px">
                <h5>Giá: 560.000 VNĐ</h5>
                <hr width="650px">
                <h5>Trạng Thái : Còn hàng</h5>
                <hr width="650px">


                <button type="button" class="btn btn-primary">Mua ngay</button>
                <button type="button" class="btn btn-danger"><a href="home.php" style="color: white;"> Quay lại</a></button>
                <br>
                <h4>Chi tiết sản phẩm</h4>
                <img src="./front_end/image/sp2,1.jpg" alt="" width="45%">
                <h4>Comment</h4>
                <form action="" method="POST">
                    <textarea name="cmt" id="" cols="95" rows="5" placeholder="Nhập bình luân... "></textarea>
                    <button type="button" class="btn btn-success">Submit</button>
                    <p style="font-weight: bold;">Username</p>
                    <div style="margin:-5px 0px;border-bottom:1px solid #cdcdcd">
                        <b></b><span style="float:right;font-size:10px">10/10/2020</span>
                        <p class="m_text">Sản phẩm này đẹp đấy</p>
                        <a href="" style="font-size:10px; margin-top:-10px; " >Xóa</a>
                    </div>
                </form>
            </div>


        </div>
        <hr>
        <h3 style="margin-bottom:30px ; ">Sản phẩm cùng loại</h3>

        <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">

                <img src="./front_end/image/sp3.jpg" alt="" srcset="" width="100%">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">

                <img src="./front_end/image/sp4.jpg" alt="" srcset="" width="100%">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">

                <img src="./front_end/image/sp2,3.jpg" alt="" srcset="" width="100%">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
                <img src="./front_end/image/sp2,5.jpg" alt="" srcset="" width="100%">

            </div>


        </div>


        <?php include "./footer.php"; ?>



    </div>



</body>

</html>