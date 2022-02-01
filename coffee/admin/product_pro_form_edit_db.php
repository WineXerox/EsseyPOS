<meta charset="utf-8">
<?php
if(isset($_POST["p_id"])){
include('../condb.php');


// print_r($_POST);
// exit;
	
	$p_id = mysqli_real_escape_string($con, $_POST["p_id"]);
	$ref_t_id = mysqli_real_escape_string($con, $_POST["ref_t_id"]);
	$p_name = mysqli_real_escape_string($con, $_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($con, $_POST["p_detail"]);
	//$p_price = $_POST["p_price"];
	$p_unit = mysqli_real_escape_string($con, $_POST["p_unit"]);
	//$p_qty = $_POST["p_qty"];
	$p_img2 = mysqli_real_escape_string($con, $_POST['p_img2']);
	$p_promotion = mysqli_real_escape_string($con, $_POST['p_promotion']);
	//$p_price_sales = $_POST['p_price_sales'];
	$p_discount = mysqli_real_escape_string($con, $_POST['p_discount']);


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
	}else{
		$newname=$p_img2;
	}

	$sql = "UPDATE tbl_product SET 

	ref_t_id='$ref_t_id',
	p_name='$p_name',
	p_detail='$p_detail',
	p_unit='$p_unit',
	p_img='$newname',
	p_promotion='$p_promotion',
	p_discount='$p_discount'
	WHERE p_id=$p_id
	";

	$result = mysqli_query($con, $sql);

// echo $sql;
// exit;
	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'product_pro.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'product_pro.php'; ";
	echo "</script>";
	}
}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>




