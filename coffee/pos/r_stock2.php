<hr>
<p>
    <a href="index.php" class="btn btn-info"> รายงานยอดขาย </a>
    <a href="index.php?act=stock1" class="btn btn-info"> รายงานสต๊อก-เครื่องดื่ม </a>
    <a href="index.php?act=stock2" class="btn btn-info"> รายงานสต๊อก-เมนูอร่อย </a>
</p>
<?php
$querys = "
SELECT  p.p_id, p.p_name,p.p_price, SUM(o.d_qty) as qtotal, p.p_img, 
p.p_flavour, p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
WHERE p.ref_t_id=2
GROUP BY p.p_id
ORDER BY qtotal DESC";
$results = mysqli_query($con, $querys);
echo '<h4> รายงานสต๊อกสินค้า-เมนูอร่อย</h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='30%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวนที่ขายได้</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($results)) {
  echo "<tr>";
    echo "<td align='center'>" .@$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td>";
    echo "<b>" .$row["p_name"]."</b>"."<br>".$row["p_flavour"]."</td> ";
    echo "<td align='center'>" .$row["qtotal"] ."  " .$row["p_unit"] ."</td>"; 
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>