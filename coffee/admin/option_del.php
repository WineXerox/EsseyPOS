<?php
if(isset($_GET["ID"])){
include('../condb.php');
	$opid  = mysqli_real_escape_string($con, $_GET["opid"]);
	$ID  = mysqli_real_escape_string($con, $_GET["ID"]);
	
	$sql = "DELETE FROM tbl_product_option WHERE op_id=$opid";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'product.php?act=option&ID=$ID'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product.php?act=option&ID=$ID'; ";
	echo "</script>";
}

}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>