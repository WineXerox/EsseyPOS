<meta charset="utf-8">
<?php
if(isset($_POST["t_name"])){
include('../condb.php');

	$t_name = mysqli_real_escape_string($con, $_POST["t_name"]);
	$check = "
	SELECT  t_name 
	FROM tbl_product_type  
	WHERE t_name = '$t_name' 
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
	
	$sql = "INSERT INTO tbl_product_type
	(t_name)
	VALUES
	('$t_name')";
	$result = mysqli_query($con, $sql);


	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'product_type.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product_type.php'; ";
	echo "</script>";
	}

	} //chk dup

	}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>