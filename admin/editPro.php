<?php include "./head.php" ?>

<?php
$sql = "SELECT * FROM category";
$stmt  = $connect->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ressl = $stmt->fetchAll();

?>
<?php if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $imgname = null;
  try {
    $sql = "SELECT * FROM product where id_product = '$id'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $ress = $stmt->fetch();
  } catch (Exception $e) {
    die("Lỗi truy vấn" . $e->getMessage());
  }

  if (isset($_POST['updatePro'])) {
    $namePro = $_POST['name_pro'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $sale = isset($_POST['sale']) ? $_POST['sale'] : 0;
    $details = $_POST['details_img'];
    $intro = $_POST['intro'];
    $date = date("Y/m/d"); 
    $cate  = $_POST['category'] ;
    // upload ảnh 
    $image_new = $_FILES['avatar'];
    $maxSize = 80000000;
    $uploads = true;
    $dir = "../front_end/image/";
    $target_file = $dir . basename($image_new['name']);
    $type = pathinfo($target_file, PATHINFO_EXTENSION);
    $allowtypes    = array('jpg', 'png', 'jpeg');
    if ($image_new['size'] > $maxSize) {
      $err = "File ảnh quá lớn vui lòng chọn ảnh khác";
      $uploads = false;
    } elseif (!in_array($type, $allowtypes)) {
      $err = " Cần chọn ảnh có định dạng jpg , png , jpeg";
      $uploads = false;
    } else {
      $imgname = uniqid() . "-" . $image_new['name'];
      if (move_uploaded_file($image_new['tmp_name'], $dir . $imgname)) {
      }
      try {
        $sql = "UPDATE product SET name_product = :name_product , price = :price , quantity = :quantity , sale = :sale , detail = :detail ,date_add_product =:date_add_product , images = :images , intro = :intro , id_category = :id_category where id_product = :id  ";
        $stmt  = $connect->prepare($sql);
        $stmt->bindParam(":name_product", $namePro);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":sale", $sale);
        $stmt->bindParam(":detail", $details);
        $stmt->bindParam(":date_add_product", $date);
        $stmt->bindParam(":intro", $intro);
        $stmt->bindParam(":images", $imgname);
        $stmt->bindParam("id", $id); 
        $stmt->bindParam(":id_category" ,$cate) ; 
        $stmt->execute();
        header("Location:product.php");
      } catch (Exception $e) {
        die("Lỗi truy vấn" . $e->getMessage());
      }
    }
    if ($uploads == true) {
      $sql = "UPDATE product SET name_product = :name_product , price = :price , quantity = :quantity , sale = :sale , detail = :detail ,date_add_product =:date_add_product , images = :images , intro = :intro , id_category = :id_category where id_product = :id  ";
      $stmt  = $connect->prepare($sql);
      $stmt->bindParam(":name_product", $namePro);
      $stmt->bindParam(":price", $price);
      $stmt->bindParam(":quantity", $quantity);
      $stmt->bindParam(":sale", $sale);
      $stmt->bindParam(":detail", $details);
      $stmt->bindParam(":date_add_product", $date);
      $stmt->bindParam(":intro", $intro);
      $stmt->bindParam(":images", $imgname); 
      $stmt->bindParam(":id_category" , $cate) ; 
      $stmt->bindParam("id", $id);
      $stmt->execute();
      header("Location:product.php");
    } 
    else {
      $sql = "UPDATE product SET name_product = :name_product , price = :price , quantity = :quantity , sale = :sale , detail = :detail ,date_add_product =:date_add_product , intro = :intro , id_category = :id_category where id_product = :id  ";
      $stmt  = $connect->prepare($sql);
      $stmt->bindParam(":name_product", $namePro);
      $stmt->bindParam(":price", $price);
      $stmt->bindParam(":quantity", $quantity);
      $stmt->bindParam(":sale", $sale);
      $stmt->bindParam(":detail", $details);
      $stmt->bindParam(":date_add_product", $date);
      $stmt->bindParam(":intro", $intro);
      $stmt->bindParam(":id_category" , $cate) ; 
      $stmt->bindParam("id", $id);
      $stmt->execute();
      header("Location:product.php");
    }
  }
}
?>
<div class="col-xs-9 col-lg-9 col-md-9 col-sm-9">
  <div style="text-align: center;">
    Sửa sản phẩm

  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên sản phẩm</label>
      <input value="<?= $ress["name_product"] ?>" name="name_pro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Giá sản phẩm</label>
      <input required value="<?= $ress['price'] ?>" name="price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá sản phẩm VNĐ" min="0">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Số lượng</label>
      <input required value="<?= $ress['quantity'] ?>" name="quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng sản phẩm" min="0">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
      <input    name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image"> 
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Sale </label>
      <input value="<?= $ress['sale'] ?>" min=0 name="sale" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sale %">

    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Danh mục</label>
      <select name="category" class="form-control" id="exampleFormControlSelect1">
        <?php foreach ($ressl as $val) {
          $selectedCat = ($ress['id_category'] == $val['id']) ? "selected" : "";
        ?>
          <option value="<?= $val['id'] ?>" <?= $selectedCat ?>><?= $val['name_category'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Chi tiet</label>
      <input value="<?= $ress['detail'] ?>" name="details_img" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">

    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
      <textarea value="<?= $ress['intro'] ?>" name="intro" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $ress['intro'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="updatePro">Cập nhật</button>
    <button type="submit" class="btn btn-danger" style="margin :13px 11px;  " name="cat"><a style="color: white; text-decoration:none; " href="product.php">Quay lại</a></button>
  </form>

</div>


</div>
<?php include "./footer.php" ?>
</div>
</body>

</html>
<script>
  CKEDITOR.replace('intro')
</script>