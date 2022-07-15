<?php include('h.php');?>
<body class="hold-transition skin-red sidebar-mini sidebar-collapse">
	<div class="wrapper">
		<header class="main-header">
			<?php include('navbar.php');?>
		</header>
		<?php include('menu_left.php');?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
				ระบบขายหน้าร้าน 
				รายการสั่งหน้าเว็บ 
				<span class="badge" style="color: white; background-color: red;"><?php echo $ordertotal;?> </span> รายการ
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-xs-8">
											<h3>อาหาร/เครื่องดื่ม</h3>
											<?php 
											echo '<div class="row">';
											include('beverage.php');
											echo '</div>';
											echo '<hr>';
											echo '<div class="row">';
											include('food.php');
											echo '</div>';
											?>
										</div>
										<div class="col-xs-4" style="background-color: #d2d9d6;">
											<h3>รายการสั่งซื้อ</h3>
											<?php include('cart_detail.php');?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php include('footer.php');?>