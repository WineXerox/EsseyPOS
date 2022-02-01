<!-- Start menu Area -->
<section class="menu-area section-gap" style="margin-top: 100px;">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">สมัครสมาชิก เพื่อรับส่วนลดพิเศษ!!!</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				<form action="member_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<div class="col-sm-2 control-label">
							Username :
						</div>
						<div class="col-sm-5">
							<input type="text" name="m_username" required class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 control-label" class="form-control" >
							Password :
						</div>
						<div class="col-sm-5">
							<input type="password" name="m_password" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							คำนำหน้า :
						</div>
						<div class="col-sm-2">
							<select name="m_firstname" class="form-control" required>
								<option value="">-เลือกข้อมูล-</option>
								<option value="นาย">นาย</option>
								<option value="นาง">นาง</option>
								<option value="นางสาว">นางสาว</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							ชื่อ :
						</div>
						<div class="col-sm-5">
							<input type="text" name="m_name" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							นามสกุล :
						</div>
						<div class="col-sm-5">
							<input type="text" name="m_lastname" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							ที่อยู่ :
						</div>
						<div class="col-sm-5">
							<textarea name="m_address" required class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							เบอร์โทร :
						</div>
						<div class="col-sm-5">
							<input type="text" name="m_phone" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							อีเมล์ :
						</div>
						<div class="col-sm-5">
							<input type="email" name="m_email" required class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 control-label">
							ภาพโปรไฟล์ :
						</div>
						<div class="col-sm-5">
							<input type="file" name="m_img"  class="form-control" accept="image/*" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End menu Area -->