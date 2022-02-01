<!-- Start menu Area -->
<section class="menu-area section-gap" style="margin-top: 100px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">ล็อกอินเข้าสู่ระบบ</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-8">
				<form action="clogin.php" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-2 control-label">
							Username :
						</div>
						<div class="col-sm-5">
							<input type="text" name="m_username" required class="form-control" autocomplete="off" placeholder="ชื่อผู้ใช้">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 control-label" class="form-control" >
							Password :
						</div>
						<div class="col-sm-5">
							<input type="password" name="m_password" required class="form-control" placeholder="รหัสผ่าน">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End menu Area -->