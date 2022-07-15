<header id="header" id="home" id="hd" style="background-color: #000">
	<div class="header-top">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  	<ul>
						<li>
				  			เปิดบริการทุกวัน ตั้งแต่เวลา 08:00 - 20:00 น.
				  		</li>

				  		<li>
				  			<a href="tel:(0XX) XXX XXXX">(0XX) XXX XXXX</a>
				  		</li>				  					
				  	</ul>
				</div>
			</div>			  					
		</div>
	</div>			  	
	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">	
			<div>
				<h1><p style="color:white;">EsseyPOS</p></h1>
				<!-- <a href="index.php"><img src="theme/img/logo1.png" alt="" title="" /></a> -->
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
				    <li class="menu-active"><a href="index.php">หน้าหลัก</a></li>
				    <li><a href="cart.php">ตะกร้าของฉัน</a></li>
				    <li><a href="index.php#coffee">เครื่องดื่ม</a></li>
				    <li><a href="index.php#food">เมนูอร่อย</a></li>
				    <li><a href="register.php">สมัครสมาชิก</a></li>
				    <?php 
				        if(isset($_SESSION['m_id'])){ ?>
				          	
				        <li><a href="member/">คุณ<?php echo $m_name;?></a></li>
				        <li><a href="logout.php">ออกจากระบบ</a></li>
				    <?php }else{ ?>
				          	 
				        <li><a href="login.php">เข้าสู่ระบบ</a></li>
				                
				    <?php } ?>
				         <!--  <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
				              <li><a href="generic.html">Generic</a></li>
				              <li><a href="elements.html">Elements</a></li>
				            </ul>
				          </li> -->
				</ul>
			</nav><!-- #nav-menu-container -->		    		
		</div>
	</div>
</header><!-- #header -->