<section class="menu-area section-gap" id="coffee">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">สินค้าโปรโมชั่น</h1>
					<p>พิเศษ!!!...สำหรับสมาชิก สินค้าโปรโมชั่น ลด 10% - 20%</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$query = "
			SELECT * FROM tbl_product 	WHERE p_promotion = 1
			ORDER BY p_id DESC LIMIT 6";
			$result1 = mysqli_query($con, $query);
			while($rowp = mysqli_fetch_array($result1)) {
			?>
			<div class="col-lg-4 col-xs-12">
				<div class="single-menu">
					<div class="title-div justify-content-between d-flex">
						<a href="detail.php?p_id=<?php echo $rowp['p_id'];?>" target="_blank">
							<h6><?php echo $rowp['p_name'];?> 
							(<font color="red"> ลด <?php echo $rowp['p_discount'];?> % </font>)
						</h6>
						</a>
						<!-- <p class="price float-right">
							ร้อน
							เย็น
							ปั่น
						</p> -->
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
						ORDER BY op_id ASC";
						$result2 = mysqli_query($con, $query2);
						while($rowo = mysqli_fetch_array($result2)) {
							$op_dis = $rowo['op_price']*10/100;
							$op_price = $rowo['op_price']-$op_dis;
					    ?>
						    <b>
						    	<?php echo $rowo['op_name'] 
						    	.' : '
						    	.$rowo['op_price'] ;?> บาท 
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