<section class="menu-area section-gap" style="margin-top: 120px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-12">
				<div class="title">
					<h1 class="mb-10">รายละเอียดสินค้า</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-xs-12">
				<img src="p_img/<?php echo $rowpd['p_img'];?>" width="100%">
				<br><br>
				<b style="font-size: 20px;">รสชาติ</b><br>
				<p style="font-size: 20px;"><?php echo $rowpd['p_flavour'];?></p>
			</div>
			<div class="col-lg-8 col-xs-12">
				<h3> <?php echo $rowpd['p_name'];?>
				&nbsp;  &nbsp;
				<!-- <a href="cart.php?p_id=<?php // echo $rowpd['p_id'];?>&act=add" class="genric-btn primary small">  สั่งทำ </a> -->
				</h3>
				
				<?php
					$query2 = "
					SELECT * FROM tbl_product_option  as o 
					INNER JOIN  tbl_product as p ON o.ref_p_id=p.p_id
					WHERE o.ref_p_id=$p_id
					ORDER BY o.op_id ASC";
					$result2 = mysqli_query($con, $query2);		
				?>
				<h4>
				<?php

				while($rowo = mysqli_fetch_array($result2)) {
	            $p_promotion = $rowo['p_promotion'];
		        if($p_promotion==1){
		        	$disc =	$rowo['op_price'] * $rowo['p_discount']/100;
		        	$op_priced = $rowo['op_price']-$disc;
		        }else{
		        	$op_priced = $rowo['op_price'];
		        }
		        //echo '<br><br>';
				
				echo 
				'<h4>'
				.$rowo['op_name'] 
				.'<font color="red">  ราคา '
				.' : '
				.$op_priced
				.' บาท </font>';

				if($p_promotion==1){
				echo ' ปกติ <del> '.$rowo['op_price']. '  </del> บาท';
				} 
				?>
					&nbsp; &nbsp; 
									<a href="cart.php?op_id=<?php  echo $rowo['op_id'];?>&act=add" class="genric-btn primary small">  สั่งทำ </a>

									

				</h4>
				<br/>
				
				<?php } ?>
				</h4>
			
				
				<p>
					<?php echo $rowpd['p_detail'];?>
					<br>
					</
				</div>
			</div>
		</div>
	</section>