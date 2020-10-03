<?php include "./headers.php";  ?>
<?php
$sql = "SELECT * FROM slider ";
$stmt = $connect->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ress = $stmt->fetchAll();
?>
<div class="container">
    <div class="row"">
            <div class=" col-sm-12 col-md-12 col-xs-12 col-lg-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
              <?php foreach ($ress as $values) { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./front_end/image/<?= $values['images'] ?>" alt="">
                    </div>
            <?php } ?>
                <!-- <div class="carousel-item">
                     <img class="d-block w-100" src="./front_end/image/banner2.jpg" alt="">
                 </div>  -->
             </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

    </div>
    <div class="row" style="min-height: 400px; margin-top:5px;">
        <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">

            <h4>Danh mục sản phẩm</h4>
            <nav class="menu_bar">
                <ul>
                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="">Sản phẩm bán chạy </a></li>
                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href=""> Balo nam</a></li>
                    <li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="">Balo nữ</a> </li>
                    <li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="">Túi xách nam</a> </li>
                    <li> <i class="fa fa-chevron-right" aria-hidden="true"></i><a href="">Túi xách nữ</a></li>
                </ul>
            </nav>
            <br>
            <img src="./front_end/image/standee.jpg" alt="" width="100%">

        </div>



        <?php include "./content.php" ?>



    </div>
    <div class="row" style="margin-top: 20px">

        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color: red; border-radius:10px; ">
            <img src="./front_end/image/banner.png" alt="">
            <input class="em" type="email" name="email" id="" placeholder="Đăng kí ngay">
            <span class="btn btn-warning" style="margin-top:-5px ; color:white; ">Đăng kí</span>
        </div>

    </div>
    <div>
        <?php include "./footer.php";  ?>
    </div>
</div>