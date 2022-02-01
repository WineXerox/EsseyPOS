<?php
$ID = mysqli_real_escape_string($con, $_GET['ID']);
$sql = "
SELECT *
FROM tbl_product as p
INNER JOIN tbl_product_type as t ON p.ref_t_id=t.t_id
WHERE p.p_id=$ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
 
$query = "SELECT * FROM tbl_product_type
WHERE t_id!=$ref_t_id";
$result2 = mysqli_query($con, $query);
?>
<h4> ฟอร์มแก้ไขรายละเอียดสินค้าโปรโมชั่น </h4>
<form action="product_pro_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทโปรโมชั่น :
    </div>
    <div class="col-sm-2">
      <select name="p_promotion" class="form-control" required>
        <option value="1">สินค้าโปรโมชั่น</option>
        <option value="0">สินค้าทั่วไป</option>
        
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-2">
      <select name="ref_t_id" class="form-control" required>
        <option value="<?php echo $row["ref_t_id"];?>">
          <?php echo $row["t_name"]; ?>
          <option value="t_id">ประเภทสินค้า</option>
          <?php foreach($result2 as $results){?>
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
      <div class="col-sm-3">
        <input type="text" name="p_name" required class="form-control" autocomplete="off" value="<?php echo $row['p_name'];?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2 control-label">
        รายละเอียดสินค้า :
      </div>
      <div class="col-sm-8">
        <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">
        <?php echo $row['p_detail'];?>
        </textarea>
      </div>
    </div>
    <!--  <div class="form-group">
      <div class="col-sm-2 control-label">
        ราคา :
      </div>
      <div class="col-sm-2">
        <input type="text" name="p_price" required class="form-control" value="<?php echo $row['p_price'];?>">
      </div>
      <div class="col-sm-1">
        บาท
      </div>
    </div> -->
    <div class="form-group">
      <div class="col-sm-2 control-label">
        ส่วนลดสมาชิก :
      </div>
      <div class="col-sm-2">
        <input type="number" name="p_discount" required class="form-control" value="<?php echo $row['p_discount'];?>" min="0">
      </div>
      <div class="col-sm-1">
        เปอร์เซ็น
      </div>
    </div>
<!--     <div class="form-group">
      <div class="col-sm-2 control-label">
        จำนวนสินค้า :
      </div>
      <div class="col-sm-1">
        <input type="text" name="p_qty" required class="form-control" value="<?php echo $row['p_qty'];?>">
      </div>
    </div> -->
    <div class="form-group">
      <div class="col-sm-2 control-label">
        หน่วยนับสินค้า :
      </div>
      <div class="col-sm-2">
        <select name="p_unit" class="form-control" required>
          <option value="<?php echo $row["p_unit"];?>">
            <?php echo $row['p_unit'];?>
            <option value="t_id">-เลือกข้อมูล-</option>
            <option value="แก้ว">แก้ว</option>
            <option value="ชิ้น">ชิ้น</option>
            <option value="กล่อง">กล่อง</option>
            <option value="อัน">อัน</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2 control-label">
          ภาพสินค้า :
        </div>
        <div class="col-sm-4">
          ภาพเก่า <br>
          <img src="../p_img/<?php echo $row['p_img'];?>" width="200px">
          <br><br>
          <input type="file" name="p_img"  accept="image/*" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
          <input type="hidden" name="p_img2" value="<?php echo $row['p_img'];?>">
          <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </div>
      
    </form>