<meta charset="utf-8">
<?php
if(isset($_POST["op_name"])){
include('../condb.php');
$op_name = mysqli_real_escape_string($con, $_POST['op_name']);
$op_price = mysqli_real_escape_string($con, $_POST['op_price']);
$ref_p_id = mysqli_real_escape_string($con, $_POST['ref_p_id']);


$check = "
	SELECT ref_p_id, op_name 
	FROM tbl_product_option  
	WHERE op_name = '$op_name' 
	AND  ref_p_id=$ref_p_id
	";
    $result1 = mysqli_query($con, $check);
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
	echo "<script>";
	echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
	echo "window.history.back();";
	echo "</script>";
    }else{

	$sql = "INSERT INTO  tbl_product_option  
	(ref_p_id,op_name,op_price)
	VALUES 
	('$ref_p_id','$op_name','$op_price')
	";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไข password เรียบร้อย');";
	echo "window.location = 'product.php?act=option&ID=$ref_p_id'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product.php?act=option&ID=$ref_p_id'; ";
	echo "</script>";
	}
	} // chk dup

	}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>