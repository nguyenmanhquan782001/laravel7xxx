<?php ob_start(); ?>
<?php include_once "head.php" ?> 
<?php 
  if (isset($_GET['id'])) {
      $id = $_GET['id'] ; 
      try { 
          $sql = "SELECT * FROM category where id = '$id' " ; 
          $stmt = $connect->prepare($sql) ; 
          $stmt->execute() ; 
          $stmt->setFetchMode(PDO::FETCH_ASSOC) ; 
          $rel = $stmt->fetch() ;  
      }catch (Exception $e) {
          die("Lỗi truy vấn" .$e->getMessage()) ; 
      }  
  }
?> 
<?php 
if (isset($_POST['subCat'])) { 
    $new_cate = $_POST['cate'] ;
    $sqls = "UPDATE category SET name_category  = '$new_cate' where id = '$id' " ; 
    $stmts = $connect->prepare($sqls) ;  
    $stmts->execute() ; 
    header("Location:index1.php") ; 
}

?>
<div class="col-xs-9 col-md-9 col-lg-9 col-sm-9">
    <div class="col-sm-12" style="font-size:25px ; text-align:center;">
        Cập nhật danh mục
    </div> 
   
    <div class="col-sm-12">
        <b style="margin-left:15px;">Danh mục</b>
        <form action="" method="post">
            <div class="col-sm-12">
                <input type="text" class="form-control" id="inputPassword" placeholder="" name="cate" value="<?=$rel['name_category']?>">
            </div>
            <button type="submit" class="btn btn-dark" style="margin :13px 11px; " name="subCat">Cập nhật</button>
            <button type="submit" class="btn btn-danger" style="margin :13px 11px;  " name="cat"><a style="color: white; text-decoration:none; " href="index1.php">Quay lại</a></button>
        </form>
    </div>


</div>
</div>
<?php include_once "./footer.php" ?>
</div>



</body>

</html>
