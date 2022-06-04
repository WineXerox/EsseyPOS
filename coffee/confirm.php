<?php 
include('header.php');
include('menu_top.php');
if($m_id==''){
        echo "<script>";
        echo "alert(\" กรุณาสมัครสมาชิก ก่อนสั่งสินค้าออนไลน์\");"; 
        echo "window.location = 'register.php'; ";
        echo "</script>";
}

//include('menu_top.php');
include('confirm_detail.php');
echo '<hr>';
include('footer.php');
?>