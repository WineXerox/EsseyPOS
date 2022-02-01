<!-- Start menu Area -->
<style type="text/css">
	input[type="number"], text {
    background-color : yellow; 
    color: red;
    text-align: center;
}

</style>
<section class="menu-area section-gap" style="margin-top: 150px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">รายการสั่งซื้อ <a href="index.php" class="btn btn-primary">เลือกสินค้า</a></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-9">
<?php
    error_reporting( error_reporting() & ~E_NOTICE );
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

		    echo "<script>";
			echo "window.location ='cart.php'; ";
			echo "</script>";
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
        <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
            <td align="center" bgcolor="#EAEAEA"><strong>ลำดับ</strong></td>
            <td align="center" bgcolor="#EAEAEA"><strong>รูปภาพ</strong></td>
            <td bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
            <td align="right" bgcolor="#EAEAEA"><strong>ราคา/หน่วย</strong></td>
            <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
            <td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
            <td align="center" bgcolor="#EAEAEA"><strong>ลบสินค้า</strong></td>
        </tr>
<?php

if(!empty($_SESSION['shopping_cart']))
{
require_once('condb.php');
	foreach($_SESSION['shopping_cart'] as $op_id=>$p_qty)
	{
		$sql = "SELECT o.*,p.p_img,p.p_name,
		p.p_promotion,p.p_discount,p.ref_t_id 
		FROM tbl_product_option as o
		INNER JOIN  tbl_product as p ON o.ref_p_id=p.p_id
		WHERE o.op_id=$op_id";
		$query = mysqli_query($con, $sql);
		//$total = 0;
		while($row = mysqli_fetch_array($query))
		{

			// $disc =	$row['p_price'] * $row['p_discount']/100;
			// $mprice = $row['p_price']-$disc;
			// $nprice = $row['p_price'];
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
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td width='100'>"."<img src='p_img/$row[p_img]'  width='100%'/>"."</td>";
		echo "<td width='334'>"." "; 

		if($row['ref_t_id']==1){
	    echo $row["p_name"]; 
		echo " ".$row["op_name"] ." ";
		}else{
		echo $row["p_name"];  	
		}

		echo "</td>";
		echo "<td width='100' align='right'>" 
		.number_format($mprice,2) 
		."</td>";
		echo "<td width='100' align='right'>";  
		echo "<input type='number' name='amount[$op_id]' value='$p_qty' min='1' class='form-control'/></td>";
		echo "<td width='100' align='right'><b>" .number_format($sum,2)."</b></td>";
		echo "<td width='100' align='center'><a href='cart.php?op_id=$op_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
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
if($sum > 0){ 
?>
        <tr>
        <td></td>
        <td colspan="6" align="right">
        
        <a href="cart.php?act=Cancel-Cart" class="btn btn-danger"> ยกเลิกตะกร้าสินค้า </a>
	    
        	<button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
        </td>
        </tr>
<?php } ?>
</b>
</strong>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</section>