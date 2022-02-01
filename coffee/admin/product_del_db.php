<?php
if(isset($_GET["ID"])){
include('../condb.php');
	$ID  = mysqli_real_escape_string($con, $_GET["ID"]);

	$sql = "DELETE FROM tbl_product WHERE p_id=$ID";
	$result = mysqli_query($con, $sql);	
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'product.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product.php'; ";
	echo "</script>";
}

}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>