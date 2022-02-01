<?php 
include('header.php');
include('menu_top.php');
$p_id = $_GET['p_id'];
$sql1 = "SELECT *FROM tbl_product WHERE p_id=$p_id";
$result1 = mysqli_query($con, $sql1);
$rowpd = mysqli_fetch_array($result1);

			// $disc =	$rowpd['p_price'] * $rowp['p_discount']/100;
			// $mprice = $rowpd['p_price']-$disc;
			// $nprice = $rowpd['p_price'];

//print_r($row1);


include('p_detail.php');

include('footer.php');
?>