<meta charset="utf-8">
<?php
if(isset($_POST["mid"])){
include('../condb.php');
	$mid  = mysqli_real_escape_string($con, $_POST["mid"]);
	$m_password  = mysqli_real_escape_string($con, sha1($_POST["m_password"]));

	$sql = "UPDATE tbl_member SET 
	m_password='$m_password'
	WHERE m_id=$mid
	";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขรหัสผ่านเรียบร้อย');";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
}
}else{ //if(isset()
	Header("Location: ../logout.php");
}
?>