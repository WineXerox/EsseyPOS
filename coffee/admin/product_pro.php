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
        จัดการข้อมูลสินค้าโปรโมชั่น
        </h1>
      </section>
      
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">รายการสินค้าโปรโมชั่น 
                  <!-- <a href="product_pro.php?act=add" class="btn-info btn-sm">+เพิ่มข้อมูล</a>  --></h3>
              </div>
              
              <div class="box-body">
                <div class="col-sm-12"> 
                  <?php
                  $act = (isset($_GET['act']) ? $_GET['act'] : '');
                  if($act == 'add'){
                  include('product_pro_form_add.php');
                  }elseif ($act == 'edit') {
                  include('product_pro_form_edit.php');
                  }elseif($act=='dt'){
                  include('product_pro_detail.php');
                  }else {
                  include('product_pro_list.php');
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