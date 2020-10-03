<?php ob_start(); ?>
<?php include "./head.php"?>  
 <?php 
   if ( isset($_POST['addPro'])) {
      $namePro = $_POST['name_pro'] ; 
      $price = $_POST['price'] ; 
      $quantity = $_POST['quantity'] ; 
      $img_avatar = $_FILES['avatar'] ; 
      $sale = isset($_POST['sale']) ? $_POST['sale'] : 0 ; 
      $category = $_POST['category'] ; 
      $details = $_POST['details_img'] ; 
      $intro = $_POST['intro']; 
      $date = date("Y/m/d");
      $view = 1 ; 
      $maxSize = 8000000;   
      $uploads = true ;  
      $dir = "../front_end/image/" ; 
      $target_file = $dir . basename($img_avatar['name']) ; 
      $type = pathinfo($target_file, PATHINFO_EXTENSION); 
      $allowtypes    = array('jpg', 'png', 'jpeg');
      if ($img_avatar['size'] > $maxSize) {
        $err = "File ảnh quá lớn vui lòng chọn ảnh khác" ; 
        $uploads = false ; 
      }elseif ( $namePro == '' ) {
             $err = "Tên sản phẩm không để trống" ; 
          $uploads = false ;
       
      } elseif (!in_array($type ,$allowtypes)) {
         $err = " Cần chọn ảnh có định dạng jpg , png , jpeg" ; 
         $uploads = false ; 
      }else {
        $imgname = uniqid() . "-" . $img_avatar['name'];
        if (move_uploaded_file($img_avatar['tmp_name'], $dir . $imgname)) { }
        $check = "SELECT * FROM product WHERE name_product = '$namePro'";
        $cout = $connect->prepare($check);
        $cout->execute();
        if ($cout->rowCount() > 0) {
            $err = "Sản phẩm đã tồn tại";
        } else {
            try {
                $sqls = "INSERT INTO product (name_product , images , price, date_add_product ,detail, view , id_category,sale,quantity,intro)
                 VALUES (:name_product , :images , :price, :date_add_product ,:detail, :view , :id_category, :sale, :quantity,:intro)";
                 $stmt  = $connect->prepare($sqls) ; 
                 $stmt->bindParam(":name_product",$namePro) ; 
                 $stmt->bindParam(":images" ,$imgname) ;
                 $stmt->bindParam(":price" ,$price) ;
                 $stmt->bindParam(":date_add_product" ,$date) ;
                 $stmt->bindParam(":detail" ,$details) ;
                 $stmt->bindParam(":view" , $view) ;
                 $stmt->bindParam(":id_category" ,$category) ;
                 $stmt->bindParam(":sale" ,$sale) ;
                 $stmt->bindParam(":quantity" ,$quantity) ;
                 $stmt->bindParam(":intro" ,$intro); 
                 $stmt->execute();
                 header("Location:product.php") ; 
                // $err = "Thêm thành công" ; 
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
      }
   }
 ?> 
 <?php  
     $sql = "SELECT * FROM category" ;  
     $stmt = $connect->prepare($sql) ; 
     $stmt->execute() ; 
     $result = $stmt->fetchAll(); 
 ?>
<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9"> 
  <div style="text-align: center; font-size:20px ; font-weight:bold;" >
    Thêm sản phẩm mới
  </div>
  <p><?php
    if (isset($err)) { ?>
        <p class="alert alert-danger"><?= $err ?></p>
    <?php
  
    }
    ?></p>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input required value=""  name="name_pro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Giá sản phẩm</label>
            <input required value="<?= $price ?>"  name="price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá sản phẩm VNĐ" min="0">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Số lượng</label>
            <input required value="<?= $quantity ?>"  name="quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá sản phẩm VNĐ" min="0">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            <input required value="<?= $img_avatar ?>"  name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Sale </label>
            <input value="<?= $sale ?>"  min= 0 name="sale" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sale %">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Danh mục</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
               <?php foreach ($result as $values) { ?>  
               <option value="<?=$values['id']?>"><?=$values['name_category']?></option>
               <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Chi tiet</label>
            <input value="" name="details_img" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Chi tiết sản phẩm">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
            <textarea  name="intro" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="addPro">Thêm mới</button>
          <button type="submit" class="btn btn-danger" style="margin :13px 11px;  " name="cat"><a style="color: white; text-decoration:none; " href="product.php">Quay lại</a></button>
        </form>


      </div>

    </div>
    <?php include "./footer.php";  ?>
  </div> 
   <script>
     CKEDITOR.replace('exampleFormControlTextarea1') ; 
   </script>
</body>

</html>