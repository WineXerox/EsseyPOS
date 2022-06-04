<?php
$order_id = mysqli_real_escape_string($con, $_GET['order_id']);
$sqlb = "
SELECT * FROM tbl_orders as o
INNER JOIN tbl_member as m ON o.ref_m_id=m.m_id
WHERE o.order_id=$order_id
";
$resultb = mysqli_query($con, $sqlb);
$rowb = mysqli_fetch_array($resultb);
//extract($rowb);


//แคชเชียร์
$sqlbc = "
SELECT * FROM tbl_orders_log as l 
INNER JOIN tbl_member as m ON l.ref_m_id=m.m_id
WHERE l.ref_order_id=$order_id
";
$resultbc = mysqli_query($con, $sqlbc);
$rowbc = mysqli_fetch_array($resultbc);

?>
<section>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">รายการสั่งซื้อ</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<center>
				<button  id="hd" class="btn btn-primary" onclick="window.print();"> Print </button>
				</center>
				<p> <b> Bill ID 000<?php echo $_GET['order_id'];?>
					ว/ด/ป  <?php echo date('d/m/Y H:i:s',strtotime($rowb['order_date']));?>
				</b> </p>
				<p><b>ผู้สั่ง
					<?php echo $rowb['m_name'];?>
					โทร
				<?php echo $rowb['m_phone'];?></b></p>
				
				
				
				<table  align="center" class="table table-hover">
					<tr bgcolor="#EAEAEA">
						<td align="center">ลำดับ</td>
						<td>สินค้า</td>
						<td align="right">ราคา</td>
						<td align="center">จำนวน</td>
						<td align="right">รวม/รายการ</td>
						<td align="right">  เพิ่มเติม   </td>
					</tr>
					<?php
					$queryb = "
					SELECT * FROM tbl_order_detail as o
					INNER JOIN tbl_product_option  as p ON o.ref_op_id=p.op_id
					INNER JOIN tbl_product  as d ON p.ref_p_id=d.p_id
					INNER JOIN tbl_orders  as r  ON o.ref_order_id=r.order_id
					WHERE o.ref_order_id = $order_id
					ORDER BY p.op_id DESC";
					$result = mysqli_query($con, $queryb);
					//echo $queryb;
					$total = 0;
					while($row = mysqli_fetch_array($result)) {
					$p_promotion = $row['p_promotion'];
					if($p_promotion==1){
					$disc =	$row['op_price'] * $row['p_discount']/100;
					$mprice = $row['op_price']-$disc;
					}else{
						$mprice = $row['op_price'];
					}				
						echo "<tr>";
						echo "<td align='center'>". $i += 1 ."</td>";					
						echo "<td>" . $row["p_name"] . "</td>";
						echo "<td align='right'>" .number_format($mprice,2) ."</td>";
						echo "<td align='center'>$row[d_qty]</td>";
						echo "<td align='right'>".number_format($row['d_price_total'],2)."</td>";
						echo "<td align='right'>"."<b>".$row['order_level']."</b>"."</td>";
						echo "</tr>";
						$total +=$row['d_price_total'];
					}
						echo "<tr bgcolor='#e0d0d0'>";
						echo "<td  align='right' colspan='4'><b>รวม</b></td>";
						echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
						echo "</tr>";
					?>
				</table>
				<p align="right">
					<b> ผู้รับเงิน/แคชเชียร์ :  <?php echo $rowbc['m_name'];?> </b>
				</p>
		</div>
	</div>
</div>
</section>