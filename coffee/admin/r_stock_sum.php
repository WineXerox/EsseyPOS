<h4>เลือกช่วงเรียกดูรายงาน</h4>
<form action="" method="get" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เลือกวันที่
    </div>
    <div class="col-sm-4">
      <input type="date" name="dn" class="form-control" required>
    </div>
    <div class="col-sm-1">
      <button type="submit" name="act" value="sum2" class="btn btn-info">เรียกดู</button>
    </div>
  </div>
</form>
<hr>
<?php
$dn= date('Y-m-d');
$querys = "
SELECT  
p.p_id, 
p.p_name,
p.p_price, 
SUM(o.d_qty) as qtotal, 
SUM(o.d_price_total) as ptotal,
p.p_img,
p.p_flavour, 
p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
WHERE p.ref_t_id=1
AND o.d_date='$dn' 
GROUP BY p.p_id
ORDER BY qtotal DESC";
//INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
$results = mysqli_query($con, $querys);
echo '<h4> ยอดขายเครื่องดื่ม วันที่'. date('d/m/Y') .'</h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      
      <th width='20%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวนแก้ว</center></th>
      <th width='10%'><center>ราคา</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($results)) {
    @$i +=1;
  echo "<tr>";
    echo "<td align='center'>" .$i .  "</td> ";
    echo "<td>"
        ."<b>"
        .$row["p_name"]
        ."</b>";
    echo "</td> ";

    echo "<td align='center'><b>" .$row["qtotal"] ."  " .$row["p_unit"] ."</b></td>";
    echo "<td align='center'><b>" .$row["ptotal"] ."</b></td>";
  echo "</tr>";
  @$bvtotal +=$row["ptotal"];
  }
  echo "<tr>";
    echo "<td align='right' colspan='4'>";
    echo 'รวมราคาขายประเภทเครื่องดื่ม ';
    echo '<b>';
    echo number_format($bvtotal);
    echo '</b>';
    echo  ' บาท';
    echo  "</td> ";
  echo "<tr>";
echo "</table>";

echo '<hr>';

//food

$querys2 = "
SELECT  
p.p_id, 
p.p_name,
p.p_price, 
SUM(o.d_qty) as qtotal, 
SUM(o.d_price_total) as ptotal,
p.p_img,
p.p_flavour, 
p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
WHERE p.ref_t_id=2
AND o.d_date='$dn' 
GROUP BY p.p_id
ORDER BY qtotal DESC";
//INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
$results2 = mysqli_query($con, $querys2);
echo '<h4> ยอดขายประเภทเมนูอร่อยวันที่'. date('d/m/Y') .'</h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      
      <th width='20%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวน</center></th>
      <th width='10%'><center>ราคา</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($results2)) {
    @$k +=1;
  echo "<tr>";
    echo "<td align='center'>" .$k .  "</td> ";
    echo "<td>"
        ."<b>"
        .$row["p_name"]
        ."</b>";
    echo "</td> ";
    echo "<td align='center'><b>" .$row["qtotal"] ."  " .$row["p_unit"] ."</b></td>";
    echo "<td align='center'><b>" .$row["ptotal"] ."</b></td>";
  echo "</tr>";
  @$ftotal +=$row["ptotal"];
  }
  echo "<tr>";
    echo "<td align='right' colspan='4'>";
    echo 'รวมราคาขายประเภทเมนูอาหารอร่อย ';
    echo '<b>';
    echo number_format($ftotal);
    echo '</b>';
    echo  ' บาท';
    echo  "</td> ";
  echo "<tr>";
echo "</table>";

echo '<p align="right">';
echo '<b>';
echo '<font color="red">';
echo 'รวมราคาขายสิค้าทั้งหมด(เครื่องดื่ม+ขนม) = ';
echo number_format($bvtotal + $ftotal); 
echo ' บาท';
echo '</font>';
echo '</b>';
echo '</p>';

mysqli_close($con);
?>