<?php ob_start() ?>
<?php include "./head.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqls = "DELETE FROM slider where id = '$id'";
    $stmt = $connect->prepare($sqls);
    $stmt->execute();
}
?>
<?php
$sql = "SELECT * FROM slider";
$stmt = $connect->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$res = $stmt->fetchAll();

?>
<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9">
    <div class="col-12" style="text-align: center; font-size:20px ; font-weight:bold;">
        Quản trị slide
    </div>
    <a href="addSlider.php"><span style="margin-top: 10px; margin-left : 50px;  " class="btn btn-danger">Thêm mới slide</span></a>
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <table class="table table-hove">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Link ảnh</th>
                    <th>Status</th>
                    <th>Ngày đăng</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                foreach ($res as $val) {

                ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><img src="../front_end/image/<?= $val['images'] ?>" alt="" srcset="" width="100px"></td>
                        <td><?= $val['link'] ?></td>
                        <td><?= ($val['status'] == 0) ? "Show" : "Ẩn" ; ?></td>

                        <td><?= $val['date_add_slider'] ?></td> 
                        
                        <td><a href="editSlider.php?id=<?= $val['id'] ?>"><i style="font-size: 25px; margin-left:10px; color :#cccc00;" class="far fa-edit"></i></a></td>
                        <td><a style="font-size: 25px; margin-left:-5px; color:#e60000;" href="slider.php?id=<?= $val['id'] ?>" class="far fa-trash-alt" onclick="return confirm('Bạn có muốn xóa không?')"></a>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>

        </table>
    </div>

</div>
</div>
<?php include "./footer.php" ?>
</div>
</body>

</html>