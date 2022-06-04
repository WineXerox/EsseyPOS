<hr>
<form action="saveorder.php" class="form-horizontal" method="post">
	<div class="form-group row">
		<div class="col-md-2 control-label"> ว/ด/ป </div>
		<div class="col-md-3">
			<input type="text" class="form-control" name="o_date"  readonly value="<?php echo date('d-m-Y');?>">
		</div>
		<div class="col-md-1 control-label"> พนง. </div>
		<div class="col-md-3">
			<input type="text" class="form-control" name="staff_name"  value="<?php echo $m_name;?>" readonly>
			<input type="hidden" class="form-control" name="m_id" value="<?php echo $m_idq;?>">
		</div>
		<div class="col-md-1">
		<button type="submit" class="btn btn-primary" onclick="return confirm('ยืนยัน');">ยืนยันการสั่ง</button></div>
	</div>
	<div class="form-group row">
		<div class="col-md-2 control-label"> สมาชิก </div>
		<div class="col-md-3">
			<input type="text" class="form-control" name="m_name"  value="<?php echo $m_nameq;?>" readonly>
		</div>
		<div class="col-md-1 control-label"> โทร </div>
		<div class="col-md-3">
			<input type="text" class="form-control" name="m_phone" value="<?php echo $m_phoneq;?>" readonly>
		</div>
		
	</div>
	<div class="form-group row">
		<div class="col-md-2 control-label"> เพิ่มเติม </div>
		<div class="col-md-3">
			<div class="col-sm-13">
				<select name="order_level" class="form-control" required>
				<option value="t_id">-เลือกข้อมูล-</option>
				<option value="เพิ่มความหวาน">เพิ่มความหวาน</option>
				<option value="เพิ่มความเข้ม">เพิ่มความเข้ม</option>
				</select>
    		</div>
		</div>
	</div>
	<table  align="center" class="table table-hover">
		<tr bgcolor="#EAEAEA">
			<td align="center" width="5%">ลำดับ</td>
			<td align="center" width="5%"><strong>image</strong></td>
			<td align="center" width="15%">สินค้า</td>
			<td align="right" width="10%">ราคา</td>
			<td align="right" width="5%">จำนวน</td>
			<td align="right" width="7%">รวม/รายการ</td>
		</tr>
		<?php
			$total=0;
			foreach($_SESSION['shopping_cart'] as $op_id=>$p_qty)
			{
				$sql = "SELECT o.*,p.p_img,p.p_name,p.p_promotion,p.p_discount,p.ref_t_id
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
				echo  $i += 1;
				echo "</td>";
				echo "<td width='100'>"."<img src='../p_img/$row[p_img]'  width='100%'/>"."</td>";
				echo "<td width='334'>"." ";
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
	<input type="hidden" name="staff_id" value="<?php echo $m_id;?>">
</form>