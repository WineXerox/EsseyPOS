<?php
			$query = "
			SELECT * 
			FROM tbl_product_option as o 
			INNER JOIN tbl_product as p  ON o.ref_p_id=p.p_id  
			WHERE p.ref_t_id = 2
			ORDER BY o.op_id";
			$resultf = mysqli_query($con, $query);

			while($rowfood = mysqli_fetch_array($resultf)) {
		    $disc =	$rowfood['p_price'] * $rowfood['p_discount']/100;
			$mprice = $rowfood['op_price'];
			$nprice = $rowfood['p_price'];
?>
<div class="col-xs-3">
	<h5><b>
	<?php $total = ""; if ( $rowfood['p_stotal']*10/100 +   $rowfood['p_qty'] >=  $rowfood['p_stotal']*10/100 +  $rowfood['p_stotal']) { 
						$total = "สินค้าหมด";
			} else if ( $rowfood['p_stotal']*10/100 +   $rowfood['p_qty'] >=  $rowfood['p_stotal']) { 
						$total = "สินค้าใกล้หมด";}
			echo $rowfood['p_name'];
			echo ($total != "" ? '(<font color="red"> ' .$total. ' </font>)': null);
	?>
	<?php 
	
	$p_promotion = $rowfood['p_promotion'];
        if($p_promotion==1){

	echo '<font color="red"> (ลด ' .$rowfood['p_discount']. '%) </font>';
	}
	?>

</b></h5>
	<p class="price float-right">
		<!-- <font color="red">	สมาชิก <?php echo $mprice;?> บ.</font>
		<br>
		<font color="red">
		ทั่วไป <?php echo $nprice;?> บ.
		</font> -->
	</p>
	<p class="price float-right">
		ราคา <?php echo $mprice;?> บาท
	</p>
	<p>
		<center>
		<!-- <a href="pos.php?op_id=<?php echo $rowfood['op_id'];?>&act=add" target="_blank"> -->
		<img src="../p_img/<?php echo $rowfood['p_img'];?>" width="100%">
		<!-- </a> -->
		</center>
		<a href="pos.php?op_id=<?php echo $rowfood['op_id'];?>&act=add" class="btn btn-primary" style="width: 100%">  สั่ง </a>
	</p>
</div>
<?php } ?>