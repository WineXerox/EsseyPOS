<!-- Start menu Area -->
<section class="menu-area section-gap" id="food">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">รายการอาหารอร่อย</h1>
					<p>คำอธิบาย : เมนูยอดฮิตรายการอาหารอร่อยประจำร้าน</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$query = "
			SELECT * 
			FROM tbl_product_option as o 
			INNER JOIN tbl_product as p  ON o.ref_p_id=p.p_id  
			WHERE p.ref_t_id = 2 AND p.p_promotion=0
			ORDER BY o.op_id DESC LIMIT 6
			";
			$result1 = mysqli_query($con, $query);
			while($rowp = mysqli_fetch_array($result1)) {
			$disc =	$rowp['p_price'] * $rowp['p_discount']/100;
			$mprice = $rowp['op_price'];
			$nprice = $rowp['p_price'];
			?>
			<div class="col-lg-4 col-xs-12">
				<div class="single-menu">
					<div class="title-div justify-content-between d-flex">
						<a href="detail.php?op_id=<?php echo $rowp['op_id'];?>" target="_blank">
						<h6><?php echo $rowp['p_name'];?>
						<?php $total = ""; if ($rowp['p_stotal']*10/100 +  $rowp['p_qty'] >= $rowp['p_stotal']*10/100 + $rowp['p_stotal']) { 
									$total = "สินค้าหมด";
							} else if ($rowp['p_stotal']*10/100 +  $rowp['p_qty'] >= $rowp['p_stotal']) { 
									$total = "สินค้าใกล้หมด";}
							?>
							<font color="red"><?php echo $total; ?></font>
						</h6>
					</a>
						<p class="price float-right">
							ราคา <?php echo $mprice;?> บาท
						</p>
					</div>
					<p>
						<center>
							<a href="detail.php?p_id=<?php echo $rowp['p_id'];?>" target="_blank">
								<img src="p_img/<?php echo $rowp['p_img'];?>" width="100%">
							</a>
							</center>
						<br>
						<!-- <b>ราคาปกติ <?php echo $nprice;?> บาท </b><br> -->
						<?php echo $rowp['p_flavour'];?>
						<a href="cart.php?op_id=<?php echo $rowp['op_id'];?>&act=add" class="genric-btn primary small">  สั่งซื้อ </a>
					</p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- End menu Area -->