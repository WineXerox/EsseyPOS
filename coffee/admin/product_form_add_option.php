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
<h4> ฟอร์มจัดการ option </h4>
<form  method="post" class="form-horizontal" enctype="multipart/form-data">
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
        <input type="text" name="p_flavour" required class="form-control" value="<?php echo $row['p_flavour'];?>" disabled>
      </div>
    </div>
    </form>
    <hr>
    <form  method="post" class="form-horizontal" action="option_db.php">
    <div class="form-group">
      <div class="col-sm-2 control-label">
        ประเภท :
      </div>
      <div class="col-sm-2">
        <select name="op_name" class="form-control" required>
            <option value="">-เลือกข้อมูล-</option>
            <option value="ร้อน">-ร้อน-</option>
            <option value="เย็น">-เย็น-</option>
            <option value="ปั่น">-ปั่น-</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2 control-label">
        ราคา :
      </div>
      <div class="col-sm-2">
        <input type="number" name="op_price" required class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
      </div>
      <div class="col-sm-8">
        <input type="hidden" name="ref_p_id" value="<?php echo $_GET['ID'];?>">
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
    </form>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-5">
    <h4>List</h4>

    <?php 

$query = "SELECT * FROM tbl_product_option WHERE ref_p_id=$ID";
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='5%'>ID</th>
      <th>ประเภท</th>
      <th>ราคา</th>
      <th width='5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$k += 1 ."</td> ";
    echo "<td>" .$row["op_name"] .  "</td> ";
    echo "<td>" .$row["op_price"] .  "</td> ";
    //echo "<td><a href='option_del.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
    echo "<td><a href='option_del.php?opid=$row[0]&ID=$ID' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
    ?>
  </div>


