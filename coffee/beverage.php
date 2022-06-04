<section class="menu-area section-gap" id="coffee">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">รายการเครื่องดื่ม</h1>
					<p>คำอธิบาย : เมนูยอดฮิตรายการเครื่องดื่มประจำร้าน</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$query = "
			SELECT * FROM tbl_product WHERE ref_t_id = 1 AND p_promotion = 0
			ORDER BY p_id DESC LIMIT 6";
			$result1 = mysqli_query($con, $query);
			while($rowp = mysqli_fetch_array($result1)) {
			?>
			<div class="col-lg-4 col-xs-12">
				<div class="single-menu">
					<div class="title-div justify-content-between d-flex">
						<a href="detail.php?p_id=<?php echo $rowp['p_id'];?>" target="_blank">
							<h6><?php echo $rowp['p_name'];?>
							<?php $total = ""; if ($rowp['p_stotal']*10/100 +  $rowp['p_qty'] >= $rowp['p_stotal']*10/100 + $rowp['p_stotal']) { 
									$total = "สินค้าหมด";
							} else if ($rowp['p_stotal']*10/100 +  $rowp['p_qty'] >= $rowp['p_stotal']) { 
									$total = "สินค้าใกล้หมด";}
							?>
							<font color="red"><?php echo $total; ?></font>
							</h6>
						</a>
					</div>
					<p>
						<center>
						<a href="detail.php?p_id=<?php echo $rowp['p_id'];?>" target="_blank">
							<img src="p_img/<?php echo $rowp['p_img'];?>" width="100%">
						</a>
						</center>
					
						<br>
						<?php 
					    $pid =  $rowp['p_id'];
						//query option
					    $query2 = "
						SELECT * FROM tbl_product_option WHERE ref_p_id=$pid
						ORDER BY op_id ASC" or die("Error:" . mysqli_error());
						$result2 = mysqli_query($con, $query2);
						while($rowo = mysqli_fetch_array($result2)) {
					    ?>
						    <b>
						    	<?php echo $rowo['op_name'] .' : '. $rowo['op_price'];?> บาท 
							</b>
							<?php } ?>
							<br>
						<?php echo $rowp['p_flavour'];?>
						<a href="detail.php?p_id=<?php echo $rowp['p_id'];?>" class="genric-btn primary small">  สั่งซื้อ </a>
					</p>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
</section>