<?php 
$ID = mysqli_real_escape_string($con, $_GET['ID']);
$sql = "SELECT * FROM tbl_product_type WHERE t_id=$ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>
<h4>ฟอร์มแก้ไขประเภทสินค้า </h4>
<form action="product_type_edit_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อประเภทสินค้า :
    </div>
    <div class="col-sm-3">
      <input type="text" name="t_name" required class="form-control" value="<?php echo $row['t_name'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-1">
        <input type="hidden" name="t_id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>