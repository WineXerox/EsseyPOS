<?php
$ID = mysqli_real_escape_string($con, $_GET['ID']);
$sql = "SELECT * FROM tbl_product as p 
INNER JOIN tbl_product_type  as t ON p.ref_t_id=t.t_id 
WHERE p.p_id= $ID
ORDER BY p.p_id DESC";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>
<h4> รายละเอียดสินค้า </h4>
<form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-2">
      <select name="t_id" class="form-control" required disabled>
        <option value="<?php echo $row["t_id"];?>">
                <?php echo $row["t_name"]; ?>
              <option value="t_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["t_id"];?>">
                <?php echo $results["t_name"]; ?>
              </option>
              <?php } ?>
            </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อสินค้า :
    </div>
    <div class="col-sm-5">
      <input type="text" name="p_name" required class="form-control" autocomplete="off" value="<?php echo $row['p_name'];?>" disabled>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-2 control-label">
      รสชาติ :
    </div>
    <div class="col-sm-8">
      <input type="text" name="p_flavour" required class="form-control" autocomplete="off" value="<?php echo $row['p_flavour'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      รายละเอียดสินค้า :
    </div>
    <div class="col-sm-8">
      <textarea id="editor1" name="p_detail" rows="60" cols="80" style="visibility: hidden; display: none;"> 
                <?php echo $row['p_detail'];?>                         
      </textarea>
    </div>
  </div>
  <!-- <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคาสินค้า :
    </div>
    <div class="col-sm-3">
      <input type="text" name="p_price" required class="form-control" value="<?php echo $row['p_price'];?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวนสินค้า :
    </div>
    <div class="col-sm-1">
      <input type="text" name="p_qty" required class="form-control" value="<?php echo $row['p_qty'];?>" disabled>
    </div>
  </div> -->
    <div class="form-group">
    <div class="col-sm-2 control-label">
      หน่วยนับสินค้า :
    </div>
    <div class="col-sm-2">
      <select name="p_unit" class="form-control" required disabled>
        <option value="<?php echo $row["p_unit"];?>">
          <?php echo $row['p_unit'];?>
              <option value="t_id">-เลือกข้อมูล-</option>
              <option value="ชิ้น">ชิ้น</option>
              <option value="กล่อง">กล่อง</option>
              <option value="อัน">อัน</option>
            </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพสินค้า :
    </div>
    <div class="col-sm-4">
      <img src="../p_img/<?php echo $row['p_img'];?>" width="200px">
    </div>
  </div>
  
</form>