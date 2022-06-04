<meta charset="utf-8">
<?php
if(isset($_POST["t_id"])){
include('../condb.php');
	$ref_t_id = mysqli_real_escape_string($con, $_POST["t_id"]);
	$ref_m_id = mysqli_real_escape_string($con, $_POST["ref_m_id"]);
	$p_name = mysqli_real_escape_string($con, $_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($con, $_POST["p_detail"]);
	$op_price = mysqli_real_escape_string($con, $_POST["op_price"]);
	$p_unit = mysqli_real_escape_string($con, $_POST["p_unit"]);
	$p_stotal = mysqli_real_escape_string($con, $_POST["p_stotal"]);
	$p_flavour = mysqli_real_escape_string($con, $_POST['p_flavour']);
	//$p_discount = $_POST['p_discount'];
	

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 
	
		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname ='f'.$numrand.$date1.$type;
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
	p_qty,
	p_stotal
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
	0,
	0
	)";

	$result = mysqli_query($con, $sql);

    $sql2 = "SELECT MAX(p_id) as pid  FROM tbl_product
	WHERE ref_t_id=$ref_t_id";
	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);

	$ref_p_id = $row['pid'];

	$sql3 = "INSERT INTO tbl_product_option
	(
	ref_p_id,
	op_name,
	op_price
	)
	VALUES
	(
	'$ref_p_id',
	'$p_name',
	'$op_price'
	)";

	$result3 = mysqli_query($con, $sql3);

	mysqli_close($con);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}

}else{ //if(isset()
	Header("Location: ../logout.php");
}

?>