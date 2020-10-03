 <?php include "./head.php" ?>
 <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $sql = "SELECT * FROM slider where id = '$id' ";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rel = $stmt->fetch();
        } catch (Exception $e) {
            die("Lỗi truy vấn" . $e->getMessage());
        }
    } else {
        header("Location:slider.php");
    }
    if (isset($_POST['edit'])) {
        $new_link = $_POST['link'];

        $new_status = $_POST['status'];
        $new_img = $_FILES['avatar'];
        $intro_new = $_POST['intro'];
        $maxSize = 8000000;
        $uploads = true;
        $dir = "../front_end/image/";
        $target_file = $dir . basename($new_img['name']);
        $type = pathinfo($target_file, PATHINFO_EXTENSION);
        $allowtypes    = array('jpg', 'png', 'jpeg');
        if ($new_img['size'] > $maxSize) {
            $err = "File ảnh quá lớn vui lòng chọn ảnh khác";
            $uploads = false;
        } elseif (!in_array($type, $allowtypes)) {
            $err = " Cần chọn ảnh có định dạng jpg , png , jpeg";
            $uploads = false;
        } else {
            $imgname = uniqid() . "-" . $new_img['name'];
            if (move_uploaded_file($new_img['tmp_name'], $dir . $imgname)) {
            }
            try {
                $sql = "UPDATE slider SET images = :images , link = :link , status = :status , intro = :intro where id = :id ";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(":images", $imgname);
                $stmt->bindParam(":link", $new_link);
                $stmt->bindParam(":status", $new_status);
                $stmt->bindParam(":intro", $intro_new);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                header("Location:slider.php");
            } catch (Exception $e) {
                die("Lỗi truy vấn <br>" . $e->getMessage());
            }
           
        }
        if ($uploads == true) {
            $sql = "UPDATE slider SET images = :images , link = :link , status = :status , intro = :intro where id = :id ";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":images", $imgname);
            $stmt->bindParam(":link", $new_link);
            $stmt->bindParam(":status", $new_status);
            $stmt->bindParam(":intro", $intro_new);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location:slider.php");
        } else {
            $sql = "UPDATE slider SET  link = :link , status = :status , intro = :intro where id = :id ";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":link", $new_link);
            $stmt->bindParam(":status", $new_status);
            $stmt->bindParam(":intro", $intro_new);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location:slider.php");
        }
    }


    ?>
 <?php

    ?>

 <div class="col-xs-9 col-md-9 col-lg-9 col-sm-9">
     <div class="col-sm-12">
         Sửa slider
     </div>

     <form action="" method="post" enctype="multipart/form-data">
         <div class="form-group">
             <label for="exampleInputEmail1">Hình ảnh</label>
             <input value="" name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">

         </div>


         <div class="form-group">
             <label for="exampleInputEmail1">Đường dẫn</label>
             <input value="<?= $rel['link'] ?>" name="link" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Chi tiết sản phẩm">
         </div>

         <div class="form-group">
             <label for="exampleFormControlSelect1">Trạng thái</label>
             <select class="form-control" id="exampleFormControlSelect1" name="status">
                 <option value="0">Hiển thị</option>
                 <option value="1">Ẩn</option>

             </select>
         </div>

         <div class="form-group">
             <label for="exampleFormControlTextarea1">Mô tả</label>
             <textarea name="intro" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $rel['intro'] ?></textarea>
         </div>

         <button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
         <button type="submit" class="btn btn-danger" style="margin :13px 11px;  " name="cat"><a style="color: white; text-decoration:none; " href="slider.php">Quay lại</a></button>
     </form>
 </div>
 </div>
 <?php include "./footer.php" ?>
 </div>
 </body>

 </html>
 <script>
     CKEDITOR.replace('exampleFormControlTextarea1');
 </script>