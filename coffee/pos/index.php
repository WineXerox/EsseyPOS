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
										รอมารับ  
										<span class="badge" style="color: white; background-color: red;"><?php echo $ordertotala;?> </span></a>

										<a href="index.php?act=all" class="btn btn-success">
										ประวัติการขาย  
									</a>
										<hr>
										</span>
										<?php 
										$act = (isset($_GET['act']) ? $_GET['act'] : '');
										if($act=='online'){
											include('order_by_member.php');
										}elseif ($act=='bill') {
											include('bill_detail.php');
										}elseif ($act=='bill2') {
											include('bill_detail2.php');
											//include('order_cash.php');
										}elseif ($act=='print') {
											include('print_detail.php');
										}elseif ($act=='wait') {
											include('order_wait.php');
									    }elseif ($act=='all') {
											include('order_close.php');
										}elseif ($act=='stock1') {
											include('r_stock.php');
										}elseif ($act=='stock2') {
											include('r_stock2.php');
										}elseif ($act=='r_d2') {
											include('r_d2.php');
										}elseif ($act=='r_d3') {
											include('r_d3.php');
										}else{
											include('r_d.php');
										}
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