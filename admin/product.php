<?php include_once "head.php" ; 
 ob_start();
?> 

<?php
   if (isset($_GET['id'])) {
       $id = $_GET['id'] ; 
       $sqls = "DELETE FROM product where id_product = '$id'" ;  
       $stmt = $connect->prepare($sqls);
       $stmt->execute();
   }
?> 
<?php 
try { 
    $sql = "SELECT id_product, name_product , images , price , sale , quantity ,id_category  , name_category from product inner join category  on product.id_category  = category.id " ; 
    $stmt = $connect->prepare($sql) ; 
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
}catch (Exception $e) {
    die ("Lỗi truy vấn <br>" .$e->getMessage()) ; 
} 
?>
<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9">
<div class="col-12" style="text-align: center; font-size:20px ; font-weight:bold;">
Quản trị sản phẩm
</div>  

<a href="addProduct.php"><span style="margin-top: 10px; margin-left : 50px;  " class="btn btn-danger">Thêm sản phẩm mới</span></a>
 <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12"> 
    <table class="table table-hover">
         <thead>
             <tr>
                 <th>STT</th>
                 <th>Tên sản phẩm</th>
                 <th>Hình ảnh</th> 
                 <th>Giảm giá</th>
                 <th>Giá</th> 
                 <th>Số lượng</th> 
                 <th>Danh mục</th> 
                 <th>Sửa</th> 
                 <th>Xóa</th>
             </tr>
         </thead> 
         <tbody>
  <?php $count = 1;   foreach ($res as $values) {  ?> 
             <tr> 
                 <td><?= $count ?></td>
                 <td><?= $values['name_product'] ?></td> 
                 <td><img src="../front_end/image/<?=$values['images'] ?>" alt="" srcset="" width= "100px"></td> 
                 <td><?=  $values['sale'] . "%" ?></td>
                <td><?=  $values['price'] . "VNĐ" ?></td> 
                <td><?= $values['quantity'] ?></td> 
                <td><?= $values['name_category'] ?></td> 
                <td><a href="editPro.php?id=<?= $values['id_product'] ?>"><i style="font-size: 25px; margin-left:10px; color :#cccc00;" class="far fa-edit"></i></a></td>
          <td><a style="font-size: 25px; margin-left:-5px; color:#e60000;" href="product.php?id=<?= $values['id_product'] ?>" class="far fa-trash-alt" onclick="return confirm('Bạn có muốn xóa không?')"></a>
             </tr>

  <?php $count++ ;  } ?>       

         </tbody>

    </table>


 </div> 
</div>   






</div> 
<?php include_once "./footer.php" ;  ?>
</div> 
</body>
 </html>