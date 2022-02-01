<?php
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_product_type  as t ON p.ref_t_id=t.t_id
AND p.p_promotion=1 
ORDER BY p.p_id DESC";
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='15%'>ประเภท</th>
      <th width='40%'>ชื่อสินค้า</th>
      <th width='10%'>ส่วนลด</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td>" .$row["t_name"] .  "</td> ";
    echo "<td>";
    echo "<a href='product.php?act=dt&ID=$row[0]' target='_blank'>"
    ."<b>"
    .$row["p_name"]
    ."</b>"
    ."</a>"
    ."<br>"
    .$row["p_flavour"]
    ."</td> ";
    echo "<td align='center' class='danger' align='right'>" .$row["p_discount"] ." % "  ."</td> ";
    echo "<td align='center'><a href='product.php?act=pro&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>
    </td> ";
    echo "<td align='center'><a href='product_pro_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>