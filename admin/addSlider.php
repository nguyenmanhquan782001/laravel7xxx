<?php include "./head.php" ?>
<?php
if (isset($_POST['addSlide'])) {
  $link = $_POST['link'];
  $title = $_POST['title'];
  $intro = $_POST['intro'];
  $img_avatar = $_FILES['avatar'];
  $date = date("Y/m/d");

  $maxSize = 8000000;
  $uploads = true;
  $dir = "../front_end/image/";
  $target_file = $dir . basename($img_avatar['name']);
  $type = pathinfo($target_file, PATHINFO_EXTENSION);
  $allowtypes    = array('jpg', 'png', 'jpeg');
  if ($img_avatar['size'] > $maxSize) {
    $err = "File ảnh quá lớn vui lòng chọn ảnh khác";
    $uploads = false;
  } elseif (!in_array($type, $allowtypes)) {
    $err = " Cần chọn ảnh có định dạng jpg , png , jpeg";
    $uploads = false;
  } else {
    $imgname = uniqid() . "-" . $img_avatar['name'];
    if (move_uploaded_file($img_avatar['tmp_name'], $dir . $imgname)) {
    }

    try {
      $sql = "INSERT INTO  slider (images , link  ,	date_add_slider  ,intro) VALUES (:images ,:link , :date_add_slider, :intro) ";
      $stmt  = $connect->prepare($sql);
      $stmt->bindParam(":images", $imgname);
      $stmt->bindParam(":link", $link);
      $stmt->bindParam(":date_add_slider", $date);
      $stmt->bindParam(":intro", $intro);
      $stmt->execute();
      header("Location:slider.php");
    } catch (Exception $e) {
      die("Lỗi truy vấn"  . $e->getMessage());
    }
  }
}

?>

<div class="col-xs-9 col-md-9 col-lg-9 col-sm-9">
  <div class="col-sm-12" style="text-align:center ; font-weight:bold; font-size:20px">
    Thêm mới slider
  </div>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Hình ảnh</label>
      <input required value="" name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tiêu đề</label>
      <input required value="" name="title" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tiêu đề">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Đường dẫn</label>
      <input value="" name="link" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Chi tiết sản phẩm">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Mô tả chi tiết</label>
      <textarea name="intro" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="addSlide">Thêm mới</button>
    <button type="submit" class="btn btn-danger" style="margin :13px 11px; " name="cat"><a style="color: white; text-decoration:none; " href="slider.php">Quay lại</a></button>
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