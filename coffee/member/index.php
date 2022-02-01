<?php include('h.php');?>
<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<?php include('navbar.php');?>
		</header>
		<?php include('menu_left.php');?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
				ระบบสมาชิก <a href="../index.php" class="btn btn-primary"> +สั่งซื้อสินค้าผ่านระบบ </a>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="col-sm-7">
									<h4> ประวัติการสั่งซื้อสินค้า </h4>
									<?php include('order_list.php');?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php include('footer.php');?>