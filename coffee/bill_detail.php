<?php
session_start();
require_once('condb.php');
$order_id = $_GET['order_id'];
$sqlb = "SELECT * FROM tbl_orders WHERE order_id=$order_id";
$resultb = mysqli_query($con, $sqlb);
$rowb = mysqli_fetch_array($resultb);
?>
<section class="menu-area section-gap" style="margin-top: 80px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">รายการสั่งซื้อ</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-9">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group row">
						<div class="col-md-2 control-label"> เลขที่ใบสั่งซื้อ </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_date"  value="000<?php echo $_GET['order_id'];?>" readonly>
						</div>
						<div class="col-md-1"> วัน/เดือน/ปี</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_time" value="<?php echo date('d/m/Y H:i:s',strtotime($rowb['order_date']));?>" readonly>
						</div>
						<div class="col-md-1"> นาฬิกา </div>
						<div class="col-md-1">
						<button onclick="window.print();"  class="btn btn-primary">พิมพ์ใบสั่งซื้อ</button></div>
					</div>
					<!-- <div class="form-group row">
						<div class="col-md-2 control-label"> ว/ด/ป ที่มารับสินค้า </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_date"  value="<?php echo date('d/m/Y',strtotime($rowb['order_date_rev']));?>" readonly>
						</div>
						<div class="col-md-1"> เวลา </div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="o_time" value="<?php echo $rowb['order_time_rev'];?>" readonly>
						</div>
						<div class="col-md-1"> นาฬิกา </div>
					</div> -->
					
					<div class="form-group row">
						<div class="col-md-2 control-label"> ผู้สั่งซื้อ </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="m_name"  readonly value="<?php echo $m_name;?>"  required>
						</div>
						
					</div>
					
					<table  align="center" class="table table-hover">
						<tr bgcolor="#EAEAEA">
							<td align="center">ลำดับ</td>
							<td align="center"><strong>รูปภาพ</strong></td>
							<td>สินค้า</td>
							<td align="right">ราคา</td>
							<td align="center">จำนวน</td>
							<td align="right">รวม/รายการ</td>
						</tr>
						<?php
						$queryb = "
						SELECT * FROM tbl_order_detail as o
						INNER JOIN tbl_product_option  as p ON o.ref_op_id=p.op_id
						INNER JOIN tbl_product  as d ON p.ref_p_id=d.p_id
						INNER JOIN tbl_orders  as r  ON o.ref_order_id=r.order_id
						WHERE o.ref_order_id = $order_id
						ORDER BY p.op_id DESC
						" or die("Error:" . mysqli_error());
						$result = mysqli_query($con, $queryb);
						$total = 0;
						while($row = mysqli_fetch_array($result)) {
												//$disc =	$row['p_price'] * $row['p_discount']/100;
						$p_promotion = $row['p_promotion'];
						if($p_promotion==1){
						$disc =	$row['op_price'] * $row['p_discount']/100;
						$mprice = $row['op_price']-$disc;
						}else{
						$mprice = $row['op_price'];
						}
											
					echo "<tr>";
						echo "<td align='center'>". @$i += 1 ."</td>";
						echo "<td width='100'>"."<img src='p_img/$row[p_img]'  width='100%'/>"."</td>";
						echo "<td>";
							if($row['ref_t_id']==1){
							echo $row["p_name"];
							echo " ".$row["op_name"] ." ";
							}else{
							echo $row["p_name"];
							}
						echo "</td>";
						echo "<td align='right'>" .number_format($mprice,2) ."</td>";
						echo "<td align='center'>".$row['d_qty']."</td>";
						echo "<td align='right'>".number_format($row['d_price_total'],2)."</td>";
					echo "</tr>";
					$total +=$row['d_price_total'];
					}
					echo "<tr bgcolor='#e0d0d0'>";
						echo "<td  align='right' colspan='5'><b>รวม</b></td>";
						echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
					echo "</tr>";
						?>
					</table>
				</form>
			</div>
		</div>
	</div>
</section>