<?php include('h.php');?>
<body class="hold-transition skin-red sidebar-mini" onload="window.print();">
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
									<span id="hd">
									<a href="pos.php" class="btn btn-primary">
										ขายหน้าร้าน  </a>
									<a href="index.php?act=online" class="btn btn-info">
										รายการสั่งหน้าร้าน  
										<span class="badge" style="color: white; background-color: red;"><?php echo $ordertotal;?> </span></a>
										<a href="index.php?act=wait" class="btn btn-warning">
										รอคิว  
										<span class="badge" style="color: white; background-color: red;"><?php echo $ordertotala;?> </span></a>
										<hr>
										</span>
										<?php  
								        include('print_detail.php');
										?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php include('footer.php');?>