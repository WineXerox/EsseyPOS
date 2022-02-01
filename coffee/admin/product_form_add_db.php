<meta charset="utf-8">
<?php
if(isset($_POST["t_id"])){
include('../condb.php');

	$ref_t_id = mysqli_real_escape_string($con, $_POST["t_id"]);
	$ref_m_id = mysqli_real_escape_string($con, $_POST["ref_m_id"]);
	$p_name = mysqli_real_escape_string($con, $_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($con, $_POST["p_detail"]);
	//$p_price = $_POST["p_price"];
	$p_unit = mysqli_real_escape_string($con, $_POST["p_unit"]);
	//$p_qty = $_POST["p_qty"];
	$p_flavour = mysqli_real_escape_string($con, $_POST['p_flavour']);
	//$p_discount = $_POST['p_discount'];
	

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 
	
		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	}

	$sql = "INSERT INTO tbl_product
	(
	ref_t_id,
	ref_m_id,
	p_name,
	p_detail,
	p_unit,
	p_img,
	p_flavour,
	p_discount,
	p_qty
	)
	VALUES
	(
	'$ref_t_id',
	'$ref_m_id',
	'$p_name',
	'$p_detail',
	'$p_unit',
	'$newname',
	'$p_flavour',
	0,
	0
	)";

	$result = mysqli_query($con, $sql);

	mysqli_close($con);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
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