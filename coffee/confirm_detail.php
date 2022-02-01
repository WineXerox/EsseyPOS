<section class="menu-area section-gap" style="margin-top: 100px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">แจ้งเวลาที่มารับสินค้า</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-9">
				<form action="saveorder.php" class="form-horizontal" method="post">
					<div class="form-group row">
						<div class="col-md-2 control-label"> ว/ด/ป ที่มารับ </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_date"  readonly value="<?php echo date('d-m-Y');?>">
						</div>
						<div class="col-md-1"> เวลา </div>
						<div class="col-md-3">
							<select name="o_time" class="form-control" required>
								<option value="">-เลือกเวลา-</option>
								<option value="9.00">- 9.00</option>
								<option value="10.00">- 10.00</option>
								<option value="11.00">- 11.00</option>
								<option value="12.00">- 12.00</option>
								<option value="13.00">- 13.00</option>
								<option value="14.00">- 14.00</option>
								<option value="15.00">- 15.00</option>
								<option value="16.00">- 16.00</option>
								<option value="17.00">- 17.00</option>
								<option value="18.00">- 18.00</option>
								<option value="19.00">- 19.00</option>
							</select>
						</div>
						<div class="col-md-1"> นาฬิกา </div>
						<div class="col-md-1">
						<button type="submit" class="btn btn-primary" onclick="return confirm('ยืนยัน');">ยืนยันการสั่งซื้อ</button></div>
					</div>
					<div class="form-group row">
						<div class="col-md-2 control-label"> ผู้ซื้อ </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="m_name"  readonly value="<?php echo $m_name;?>"  required>
						</div>
						<input type="hidden" class="form-control" name="m_id" value="<?php echo $m_id;?>">
					</div>
					
					<table  align="center" class="table table-hover">
						<tr bgcolor="#EAEAEA">
							<td align="center">ลำดับ</td>
							<td align="center"><strong>รูปภาพ</strong></td>
							<td align="center">สินค้า</td>
							<td align="right">ราคา</td>
							<td align="right">จำนวน</td>
							<td align="right">รวม/รายการ</td>
						</tr>
						<?php
							require_once('condb.php');
							$total=0;
							foreach($_SESSION['shopping_cart'] as $op_id=>$p_qty)
							{
						$sql = "
						SELECT o.*,p.p_img,p.p_name,p.p_promotion,p.p_discount,p.ref_t_id
						FROM tbl_product_option as o
						INNER JOIN  tbl_product as p ON o.ref_p_id=p.p_id
						WHERE o.op_id=$op_id";
						$query = mysqli_query($con, $sql);
								$row	= mysqli_fetch_array($query);
						$p_promotion = $row['p_promotion'];
						if($p_promotion==1){
								$disc =	$row['op_price'] * $row['p_discount']/100;
						$mprice = $row['op_price']-$disc;
						}else{
						$mprice = $row['op_price'];
						}
						
						
						
						$sum = $mprice * $p_qty;
								$total	+= $sum;
						echo "<tr>";
							echo "<td align='center'>";
							echo  @$i += 1;
							echo "</td>";
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
							echo "<td align='right'>$p_qty</td>";
							echo "<td align='right'>".number_format($sum,2)."</td>";
						echo "</tr>";
							}
							echo "<tr bgcolor='#e0d0d0'>";
														echo "<td  align='right' colspan='5'><b>รวม</b></td>";
														echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
						echo "</tr>";
						?>
					</table>
					<input type="hidden" name="ptotal" value="<?php echo $total;?>">
				</form>
				<p align="right">
					<a href="cart.php?act=Cancel-Cart" class="btn btn-danger" onclick="return confirm('ยืนยัน');"> ยกเลิกตะกร้าสินค้า </a>
				</p>
			</div>
		</div>
	</div>
</section>