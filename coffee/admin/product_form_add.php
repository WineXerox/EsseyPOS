<?php
$query = "SELECT * FROM tbl_product_type WHERE t_id=1";
$result = mysqli_query($con, $query);

?>
<h4>ฟอร์มเพิ่มข้อมูลสินค้า </h4>
<form action="product_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-2">
      <select name="t_id" class="form-control" required>
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
      <input type="text" name="p_name" required class="form-control">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-2 control-label">
      รสชาติ :
    </div>
    <div class="col-sm-8">
      <input type="text" name="p_flavour" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      รายละเอียดสินค้า :
    </div>
    <div class="col-sm-8">
      <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">                                       
      </textarea>
    </div>
  </div>
<!--   <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคาสินค้า :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_price" required class="form-control">
    </div>
    <div class="col-sm-1">
        บาท  
    </div>
  </div> -->
<!--     <div class="form-group">
    <div class="col-sm-2 control-label">
      ส่วนลดสมาชิก :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_discount" required class="form-control" placeholder="%">
    </div>
    <div class="col-sm-1">
        เปอร์เซ็น
    </div>
  </div> -->
<!-- 
    <div class="form-group">
    <div class="col-sm-2 control-label">
      จำนวนสินค้า :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_qty" required class="form-control">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-2 control-label">
      หน่วยนับสินค้า :
    </div>
    <div class="col-sm-3">
      <select name="p_unit" class="form-control" required>
              <option value="t_id">-เลือกข้อมูล-</option>
              <option value="แก้ว">แก้ว</option>
              <option value="ชิ้น">ชิ้น</option>
              <option value="กล่อง">กล่อง</option>
              <option value="ถ้วย">ถ้วย</option>
              <option value="อัน">อัน</option>
            </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพสินค้า :
    </div>
    <div class="col-sm-4">
      <input type="file" name="p_img" required class="form-control" accept="image/*">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="ref_m_id" value="<?php echo $m_id;?>">
      <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
    </div>
  </div>
</form>