
<?php include_once "./headers.php" ?>
<div class="container">
    <div class="row">
        <h6>Đăng nhập *:</h6>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-danger">Đăng nhập</button> 
                <button type="submit" class="btn btn-warning"><a href="registration.php"style="color:white; text-decoration:none ;" >Đăng kí</a></button>
            </form>

        </div>

    </div>

    <div class="row" style="margin-top: 20px">

        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color: red; border-radius:10px; ">
            <img src="./front_end/image/banner.png" alt="">
            <input class="em" type="email" name="email" id="" placeholder="Đăng kí ngay">
            <span class="btn btn-warning" style="margin-top:-5px ; color:white; ">Đăng kí</span> 
            
        </div>



    </div>
    <?php include_once "./footer.php"; ?>
</div>
