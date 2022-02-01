<?php
	include('../condb.php');
$order_id = mysqli_real_escape_string($con, $_POST['order_id']);
$staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);
$ref_s_id =2;
$sql = "UPDATE tbl_orders SET
	ref_s_id=$ref_s_id
	WHERE order_id=$order_id";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
echo "<script type='text/javascript'>";
//echo "alert('แก้ไขข้อมูลสำเร็จ');";
echo "window.location = 'index.php?act=wait'; ";
echo "</script>";
}else{
echo "<script type='text/javascript'>";
echo "window.location = 'index.php?act=wait'; ";
echo "</script>";
}
?>