<meta charset="utf-8">
<?php
if(isset($_POST["t_name"])){
include('../condb.php');
	$t_id = mysqli_real_escape_string($con, $_POST['t_id']);
	$t_name = mysqli_real_escape_string($con, $_POST["t_name"]);
	

	$sql = "UPDATE  tbl_product_type SET 
	t_name='$t_name'
	WHERE t_id=$t_id
	";

	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'product_type.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product_type.php'; ";
	echo "</script>";
}
}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>
 