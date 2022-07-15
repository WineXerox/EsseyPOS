<!-- Start menu Area -->
<style type="text/css">
	input[type="number"], text {
	background-color : yellow;
	color: red;
	text-align: center;
}
</style>
<?php
	$op_id = $_GET['op_id'];	
	$act = $_GET['act'];
	if($act=='add' && !empty($op_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			$_SESSION['shopping_cart']=array();
		}else{
		
		}
		if(isset($_SESSION['shopping_cart'][$op_id]))
		{
			$_SESSION['shopping_cart'][$op_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$op_id]=1;
		}
//    echo "<script>";
	// echo "window.location ='pos.php'; ";
// echo "</script>";
}
if($act=='remove' && !empty($op_id))  //ยกเลิกการสั่งซื้อ
{
unset($_SESSION['shopping_cart'][$op_id]);
}
if($act=='update')
{
$amount_array = $_POST['amount'];
foreach($amount_array as $op_id=>$amount)
{
$_SESSION['shopping_cart'][$op_id]=$amount;
}
}
//ยกเลิกตะกร้าสินต้า
if($act=='Cancel-Cart'){
unset($_SESSION['shopping_cart']);
}


?>
<form id="frmcart" name="frmcart" method="post" action="?act=update" class="form-horizontal">
	<table class="table table-hover">
		<tr>
			<td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
			<td bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
			<td align="right" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
			<td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
			<td align="center" bgcolor="#EAEAEA"><strong>รวม</strong></td>
			<td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
		</tr>
		<?php
		if(!empty($_SESSION['shopping_cart']))
		{
		
			foreach($_SESSION['shopping_cart'] as $op_id=>$p_qty)
			{
				$sql = "SELECT o.*,p.p_img,p.p_name,p.p_promotion,p.p_discount,p.ref_t_id
				FROM tbl_product_option as o
				INNER JOIN  tbl_product as p ON o.ref_p_id=p.p_id
				WHERE o.op_id=$op_id";
				$query = mysqli_query($con, $sql);
				//$total = 0;
				while($row = mysqli_fetch_array($query))
				{
				$p_promotion = $row['p_promotion'];
				if($p_promotion==1){
					$disc =	$row['op_price'] * $row['p_discount']/100;
					$mprice = $row['op_price']-$disc;
				}else{
					$mprice = $row['op_price'];
				}
				$sum = $mprice * $p_qty;
				$total += $sum;
				echo "<tr>";
					echo "<td>";
				echo @$i += 1;
				echo ".";
					echo "</td>";
					echo "<td width='334'>"." ";
						if($row['ref_t_id']==1){
					echo $row["p_name"];
						echo " ".$row["op_name"] ." ";
						}else{
							echo $row["p_name"];
						}
					echo "</td>";
					echo "<td width='100' align='right'>" . number_format($mprice,2) . "</td>";
					echo "<td width='100' align='right'>";
						echo "<input type='number' name='amount[$op_id]' value='$p_qty' class='form-control'/></td>";
						echo "<td width='100' align='right'><b>" .number_format($sum,2)."</b></td>";
						echo "<td width='100' align='center'><a href='pos.php?op_id=$op_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
						
					echo "</tr>";
					}
			
			}
				echo "<tr>";
					echo "<td colspan='5' bgcolor='#e0d0d0' align='right'>ราคารวม</td>";
					echo "<td align='right' bgcolor='#e0d0d0'>";
						echo "<b>";
						echo  number_format($total,2);
						echo "</b>";
					echo "</td>";
					echo "<td align='left' bgcolor='#e0d0d0'></td>";
				echo "</tr>";
		}
			?>
			<tr>
				<td></td>
				<td colspan="6" align="right">
					
					<a href="pos.php?act=Cancel-Cart" class="btn btn-danger"  onclick="return confirm('ยืนยัน');"> ยกเลิกตะกร้าสินค้า </a>
					<?php if($total > 0){ ?>
					<button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
					<button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary">
					<span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ
					</button>
					<?php } ?>
				</td>
			</tr>
			</b>
			</strong>
		</td>
	</tr>
</table>
</form>