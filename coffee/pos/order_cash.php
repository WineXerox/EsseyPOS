<?php
include('../condb.php');
// print_r($_POST);
// exit;

$order_id = mysqli_real_escape_string($con, $_POST['order_id']);
$staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);
$ref_s_id =3;
$sql = "UPDATE tbl_orders SET
	ref_s_id=$ref_s_id
	WHERE order_id=$order_id";
	$result = mysqli_query($con, $sql);

$sql5= "INSERT INTO  tbl_orders_log 
		(ref_order_id, ref_m_id)
		values
		($order_id,$staff_id)";
		$query5	= mysqli_query($con, $sql5);


	mysqli_close($con);
	
	if($result){
echo "<script type='text/javascript'>";
//echo "alert('แก้ไขข้อมูลสำเร็จ');";
echo "window.location = 'print.php?act=print&order_id=$order_id'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'index.php?act=wait'; ";
echo "</script>";
}
?>