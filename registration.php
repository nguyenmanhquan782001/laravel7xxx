  <?php include_once "./headers.php";  ?>
  <?php
    if (isset($_POST['reg']) && count($_POST)) {
        $fullName = $_POST['user'];
        $pwd = $_POST['pass'];
        $phoneNumbers = $_POST['phone'];
        $mail = $_POST['mail'];
        $address =
            $permission = 1; //user ; 
        $status = 1; //hoat dong ; 
        $check_phone = "SELECT * FROM  user  where phone = '$phoneNumbers' ";
        $check_mail = "SELECT * FROM user where email = '$mail' ";
        $count_mail = $connect->prepare($check_mail);
        $count_mail->execute();

        $count_phone = $connect->prepare($check_phone);
        $count_phone->execute();

        if ($count_mail->rowCount() > 0) {
            $error = "Email đã có người sử dụng . Vui lòng chọn email khác";
        } elseif ($count_phone->rowCount() > 0) {
            $error = "Số điện thoại đã có người sử dụng vui lòng chọn số điện thoại khác !";
        } else {
            try {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql  = "INSERT INTO  user (name_user , password , email , phone , address ,premission , status) VALUES (:name_user ,:password , :email , :phone , :address , :premission , :status)";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(":name_user", $fullName);
                $stmt->bindParam(":password", $pass);
                $stmt->bindParam(":email", $mail);
                $stmt->bindParam(":phone", $phoneNumbers);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":premission", $permission);
                $stmt->bindParam(":status", $status);
                $stmt->execute();
                $error = "Đăng kí thành công";
            } catch (Exception $e) {
                die("Lỗi thêm bản ghi");
            }
        }
    }
    ?>
  <div class="container">

      <h6 style="font-size: 25px;">Tạo tài khoản </h6>
      <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
          <?php if (isset($error)) { ?>
              <div class="alert alert-danger" role="alert">
                  <?= $error ?>
              </div>
          <?php  } else {
                echo " <b> Tạo tài khoản mới ngay : </b>";
            }

            ?>
          <form action="" method="post">
              <div class="form-group">
                  <label for="">Họ tên</label>
                  <input type="text" class="form-control" placeholder="Nhập họ tên" id="email" name="user" required>
              </div>
              <div class="form-group">
                  <label for="pwd">Password</label>
                  <input type="password" class="form-control" placeholder="Nhập password" id="pwd" name="pass" required>
              </div>
              <div class="form-group">
                  <label for="pwd">Số điện thoại</label>
                  <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="pwd" name="phone" required>
              </div>

              <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" placeholder="Nhập email" id="email" name="mail" required>
              </div>
              <div class="form-group">
                  <label for="">Địa chỉ</label>
                  <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="email" name="address" required>
              </div>
              <button type="submit" class="btn btn-primary" name="reg">Đăng kí</button>
              <button type="submit" class="btn btn-danger"><a href="login.php" style="color:white; text-decoration:none ; ">Quay lại đăng nhập</a></button>
          </form>

      </div>

      <?php include_once "./footer.php" ?>

  </div>