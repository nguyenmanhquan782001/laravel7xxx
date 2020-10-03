<?php include "admin/connect.php"  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./front_end/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Balo shop </title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

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

    h4 {
        color: white;
        text-align: center;
        padding: 7px 13px;
        background-color: #FF5622;
    }

    .menu_bar ul {
        margin: 0px;
        padding: 0px;
        list-style-type: none;
        /* border: 1px solid gray; */
        border-radius: 4px;

    }

    .menu_bar ul li {
        /* margin-left: 2px;  */
        margin-top: 5px;
        border: 1px solid gray;

        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;

    }

    .menu_bar ul li a {
        font-size: 17px;
        text-decoration: none;
        color: black;

    }

    .menu_bar ul li:hover {
        background-color: #FF5622;
        color: white;
    }

    .menu_bar ul li a:hover {
        color: white;
    }

    .menu_bar ul li i {
        margin-right: 10px;
    }

    h5,
    h6 {
        text-align: center;
    }

    .add {
        margin-left: 50px;
        padding: 7px 13px;
        background-color: #FF5622;
        border-radius: 5px;
        color: white;

    }


    .add:hover {
        background-color: #ff5c33;
        color: #f2f2f2;
        text-decoration: none;

    }

    .names a {
        position: absolute;
        right: 0px;
        top: 10px;
    }

    .namess a {
        position: absolute;
        right: 0px;
        margin-top: 10px;
    }

    .namess {
        margin-top: 10px;
    }

    hr {
        margin-top: -4px;
    }

    .em {
        width: 350px;
        height: 37px;
        margin-left: 30px;
        border-radius: 5px;
    }
</style>

<body>
    <div class="container">
        <div class="row" style="background-color:#FF5622 ; height : 125px">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <a href="home.php"><img src="./front_end/image/logo6.png" alt="" width="105px" style="margin-left: 40px; margin-top:10px;"></a>
            </div>
            <!-- /// -->
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <?php include "./search.php" ?>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:38px ; font-size: 15px ; ">
                <nav class="menu_top">
                    <ul>
                        <li><a href="login.php">Đăng nhập</a></li>
                        <li><a href="registration.php">Đăng kí</a></li>
                        <li><a href="">Quản trị</a></li>
                    </ul>
                </nav>
                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span style="font-weight: bold; color:white ; ">Giỏ hàng</span>

                </div>
            </div>

        </div>
        <div class="row" style="margin-top:5px; ">
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color: #FF5622;   ">
                <nav class="navbar navbar-expand-sm bg- justify-content-center" style="margin:5px 0; ;  ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; " class="nav-link" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; " class="nav-link" href="#">Balo nam</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; "class="nav-link" href="#">Balo nữ</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; " class="nav-link" href="#">Túi xách nam</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; " class="nav-link" href="#">Túi xách nữ</a>
                        </li>
                       
                        <li class="nav-item">
                            <a style="color: white; font-weight:bold; " class="nav-link" href="#">Liên hệ</a>
                        </li>      
                    </ul>

                </nav>

            </div>

        </div>
        <div class="row">

        </div>
    </div>
</body>

</html>