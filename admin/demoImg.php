<?php include "./head.php" ?> 
<?php 
  define("SITE_PATH",(__FILE__)) ; 
  define("SITE_UPLOAD", SITE_PATH."/upload" ) ; 
  define("SITE_URL" , "http://localhost/duantiep/admin/") ;
  define("FILE_URL" , SITE_URL. "upload/") ; 
   
?>
<div class = "col-sm-9">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input value="" name="name_pro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giá sản phẩm</label>
            <input required value="" name="price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá sản phẩm VNĐ" min="0">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Số lượng</label>
            <input required value="" name="quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng sản phẩm" min="0">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            <input required name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Sale </label>
            <input value="" min=0 name="sale" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sale %">

        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Danh mục</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
                <option value=""></option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Chi tiet</label>
            <input value="" name="details_img" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">

        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
            <textarea value="" name="intro" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="updatePro">Cập nhật</button>
        <button type="submit" class="btn btn-danger" style="margin :13px 11px;  " name="cat"><a style="color: white; text-decoration:none; " href="product.php">Quay lại</a></button>
    </form>

</div>
</div> 
<?php include "./footer.php" ; ?>
</div>