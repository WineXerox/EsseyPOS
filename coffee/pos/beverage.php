<?php
			$query = "
			SELECT * FROM tbl_product WHERE ref_t_id = 1
			ORDER BY p_id DESC";
			$result1 = mysqli_query($con, $query);
			while($rowp = mysqli_fetch_array($result1)) {
					$disc =	$rowp['p_price'] * $rowp['p_discount']/100;
			$mprice = $rowp['p_price']-$disc;
			$nprice = $rowp['p_price'];
?>
<div class="col-xs-4">
	<h5><b>
		<?php 
		echo $rowp['p_name'];
		$p_promotion = $rowp['p_promotion'];
        if($p_promotion==1){

	echo '<font color="red"> (ลด ' .$rowp['p_discount']. '%) </font>';
	} ?>
	</b></h5>
	<p class="price float-right">
		
		
	</p>
	<p>
		<center>
		<!-- a href="pos.php?p_id=<?php echo $rowp['p_id'];?>&act=add" target="_blank"> -->
			<img src="../p_img/<?php echo $rowp['p_img'];?>" width="100%">
		<br><br>
		<!-- </a> -->
		<?php
					$pid =  $rowp['p_id'];
						//query option
					$query2 = "
						SELECT * FROM tbl_product_option WHERE ref_p_id=$pid
						ORDER BY op_id ASC";
						$result2 = mysqli_query($con, $query2);
						while($rowo = mysqli_fetch_array($result2)) {
		?>
		<b>
		<a href="pos.php?op_id=<?php  echo $rowo['op_id'];?>&act=add" class=" btn btn-primary btn-sm">
			<?php echo $rowo['op_name'] .' : '. $rowo['op_price'];?>
		</a>
		</b>
		<?php } ?>
		</center>
		<br>
		<!-- 	<a href="pos.php?p_id=<?php echo $rowp['p_id'];?>&act=add" class="btn btn-primary" style="width: 100%">  สั่ง </a> -->
	</p>
</div>

<?php } ?>