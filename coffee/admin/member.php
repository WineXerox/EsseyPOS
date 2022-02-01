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
        จัดการสมาชิก
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">รายการสมาชิก
                <a href="member.php?act=add" class="btn-info btn-sm">+เพิ่มข้อมูล</a> </h3>
              </div>
              
              <div class="box-body">
                <div class="col-sm-">
                  <?php
                  $act = (isset($_GET['act']) ? $_GET['act'] : '');
                  if($act == 'add'){
                  include('member_form_add.php');
                  }elseif ($act == 'edit') {
                  include('member_form_edit.php');
                  }elseif($act=='rwd'){
                  include('member_form_rwd.php');
                  }else {
                  include('member_list.php');
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