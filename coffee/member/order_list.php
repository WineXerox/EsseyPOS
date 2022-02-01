<?php
$query = "
SELECT 
o.order_id as oid, o.ref_m_id, o.ref_s_id, o.order_date,
d.ref_order_id , COUNT(d.ref_order_id) as coid, SUM(d.d_price_total) as ctotal,
s.s_name 
FROM tbl_orders  as o
INNER JOIN  tbl_order_detail as d ON o.order_id=d.ref_order_id
INNER JOIN  tbl_status as s ON o.ref_s_id=s.s_id 
WHERE o.ref_m_id =$m_id 
GROUP BY o.order_id
ORDER BY o.order_id DESC
" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);


//print_r($result);
//echo $query;

// exit;

echo ' <table id="example1" class="table table-bordered table-striped table-hover">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='5%'><center>OrderID</center></th>
      <th width='7%'><center>รายการ</center></th>
      <th width='10%'><center>ราคารวม</center></th>
      <th width='40%'><center>สถานะ</center></th>
      <th width='10%'><center>ว/ด/ป</center></th>
      <th width='10%'><center>เปิดดู</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>".$row["oid"]."</td> ";
    echo "<td align='center'>".$row["coid"]."</td> ";
    echo "<td align='right'>" .$row["ctotal"]."</td> ";
    echo "<td>" .$row["s_name"]. "</td> ";
    echo "<td align='center'>" .date('d/m/Y',strtotime($row["order_date"])). "</td> ";
    echo "<td align='center'><a href='../bill.php?order_id=$row[0]&bill=detail' class='btn btn-info btn-xs' target='_blank'>เปิดดู</a></td> ";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>