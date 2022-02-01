<?php
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_product_type  as t ON p.ref_t_id=t.t_id 
WHERE p.ref_t_id=2
ORDER BY p.p_id DESC";
$result = mysqli_query($con, $query);
echo ' <table  id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='10%'>ประเภท</th>
      <th width='30%'>ชื่อสินค้า</th>
      <th width='5%'>+โปร</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td>";
    echo $row["t_name"]; 
    echo "</td> ";
    echo "<td>";
    echo "<a href='food.php?act=dt&ID=$row[0]' target='_blank'>"
    ."<b>" 
    .$row["p_name"]
    ."</b>"
    ."</a>" 
    ."<br>"
    .$row["p_flavour"]
    ." : ";
    $pid =  $row['p_id'];
            //query option
            $query2 = "
            SELECT * FROM tbl_product_option WHERE ref_p_id=$pid
            ORDER BY op_id ASC" or die("Error:" . mysqli_error());
            $result2 = mysqli_query($con, $query2);
            while($rowo = mysqli_fetch_array($result2)) {
            echo '<font color="red">'; 
            echo $rowo['op_price']. ' บ. ';
            echo '</font>';
            }
    echo "</td> ";
    echo "<td align='center'><a href='product.php?act=pro&ID=$row[0]' class='btn btn-info btn-xs'>จัดโปร</a>
    </td> ";
    echo "<td align='center'><a href='food.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>
    </td> ";
    echo "<td align='center'><a href='food_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>