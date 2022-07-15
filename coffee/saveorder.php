<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();  
	

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";

	// exit;
?>

<meta http-equiv="content-Type" content="text/html; charset=utf-8" />

<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

include('condb.php');
    $ref_m_id = $_POST["m_id"];
    $order_time_rev  = $_POST["o_time"];
    $order_date_rev  = date("Y-m-d");
	$p_qty = $_POST["p_qty"];
	$order_total = $_POST["ptotal"];
	$order_date = date("Y-m-d H:i:s");
	$ref_s_id = 1;

	if($order_time_rev>'20:00'){
		echo "<script>";
	    echo "alert(' ร้านปิดแล้วไม่สามารถรับได้');";
	    echo "window.history.back();";
	    echo "</script>";
	}elseif($order_time_rev<'08:00'){
		echo "<script>";
	    echo "alert(' ร้านยังไม่เปิดไม่สามารถรับได้');";
	    echo "window.history.back();";
	    echo "</script>";
	}else{
		

	

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($con, "BEGIN"); 
	$sqlo = "INSERT  INTO tbl_orders VALUES
	(
	NULL,  
	'$ref_m_id',
	'$ref_s_id',
	'$order_date_rev',
	'$order_time_rev',
	'$order_total',
	'$order_date',
	'$order_level'
	)";
	
	$query1	= mysqli_query($con, $sqlo);
	}	

// echo $sqlo;
// exit;

	$sql2 = "SELECT MAX(order_id) AS order_id FROM tbl_orders  
	WHERE ref_m_id=$ref_m_id";
	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$ref_order_id = $row['order_id'];
	
	

// echo $sql2;
// echo '<br>';
// echo $order_id;
//  exit;


	foreach($_SESSION['shopping_cart'] as $op_id=>$p_qty)

	{

	//print_r($_SESSION['shopping_cart']);



		




		$sql3	= "
		SELECT o.*,p.p_img,p.p_name,p.p_promotion,p.p_discount 
		FROM tbl_product_option as o
		INNER JOIN  tbl_product as p ON o.ref_p_id=p.p_id
		WHERE o.op_id=$op_id";
		$query3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_array($query3);


		$p_promotion = $row3['p_promotion'];
        if($p_promotion==1){
        	$disc =	$row3['op_price'] * $row3['p_discount']/100;
        	$mprice = $row3['op_price']-$disc;
        }else{
        	$mprice = $row3['op_price'];
        }

		//echo $sql3;
		//print_r($row3);

		 //exit;

		//$disc =	$row3['p_price'] * $row3['p_discount']/100;
		//$mprice = $row3['op_price'];
		//$nprice = $row3['p_price'];
		$d_price_total=$mprice*$p_qty;
		$d_date = date('Y-m-d');
		
		
		$sql4	= "INSERT INTO  tbl_order_detail 
		values(null, 
		'$ref_order_id', 
		'$op_id', 
		'$p_qty', 
		'$d_price_total',
		'$d_date'
	)";
		$query4	= mysqli_query($con, $sql4);

		// echo $sql4;

		// exit;
	}
	
	if($query1 && $query4){
		mysqli_query($con, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $op_id)
		{	
			unset($_SESSION['shopping_cart']);
		}
	}
	else{
		mysqli_query($con, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

	mysqli_close($con);

	// exit();
?>


<script type="text/javascript">
	// alert("<?php // echo $msg;?>");
	window.location ='bill.php?order_id=<?php echo $ref_order_id;?>&bill=detail';
</script>