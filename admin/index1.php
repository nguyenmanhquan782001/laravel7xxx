<?php
include_once "./head.php"; ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM category where id = '$id'";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
}
?>
<?php
if (isset($_POST['cat']) && count($_POST)) {
  $cat = $_POST['cate'];
  $check_cat = "SELECT *FROM category  where name_category = '$cat' ";
  $count_cat = $connect->prepare($check_cat);
  $count_cat->execute();
  if ($cat == "") {
    $error = "Chưa nhập tên danh mục";
  } elseif ($count_cat->rowCount() > 0) {
    $error = "Đã tồn tại danh mục";
  } else {
    try {
      $sql = "INSERT INTO  category (name_category) VALUES (:name_category) ";
      $stmt = $connect->prepare($sql);
      $stmt->bindParam(":name_category", $cat);
      $stmt->execute();
      $error = "Thêm mới thành công";
    } catch (Exception $e) {
      die("Lỗi truy vấn" . $e->getMessage());
    }
  }
}
?>
<div class="col-md-3 col-xs-3 col-lg-3 col-sm-3">
  <div class="col-sm-12" style="text-align: center; font-size:20px; font-weight:bold; ">
    Thêm danh mục
  </div>
  <?php if (isset($error)) { ?>
    <p><?= $error ?></p>


  <?php  } else {
    echo "";
  }
  ?>
  <?php
  try {
    $sql = "SELECT * FROM category";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
  } catch (Exception $e) {
    die("Lỗi truy vấn" . $e->getMessage());
  }

  ?>
  <?php


  ?>

  <form action="" method="post">

    <div class="form-group row" style="margin-left: 10px; margin-top:10px">

      <div class="col-sm-11">
        <input type="text" class="form-control" id="inputPassword" placeholder="Thêm danh mục" name="cate">
      </div>
      <button type="submit" class="btn btn-dark" style="margin :13px 72px; " name="cat">Thêm mới</button>

  </form>
</div>

</div>
<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
  <div class="col-12" style="text-align: center; font-size:20px ; font-weight:bold;">Quản trị danh mục</div>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Sủa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php $count = 1;
      foreach ($result as $values) { ?>
        <tr>
          <td><?= $count ?></td>
          <td> <?= $values['name_category'] ?></td>
          <td><a href="editCate.php?id=<?= $values['id'] ?>"><i style="font-size: 25px; margin-left:10px; color :#cccc00;" class="far fa-edit"></i></a></td>
          <td><a style="font-size: 25px; margin-left:-5px; color:#e60000;" href="index1.php?id=<?= $values['id'] ?>" class="far fa-trash-alt" onclick="return confirm('Bạn có muốn xóa không?')"></a>
          </td>
        </tr>

      <?php $count++; } ?>
    </tbody>
  </table>
</div>













</div>
<?php include "./footer.php" ?>
</div>
</body>

</html>