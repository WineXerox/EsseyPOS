<?php 
session_start();
include('condb.php');
//print_r($_SESSION);
if(isset($_SESSION['m_id'])){
$m_id = $_SESSION['m_id'];
$m_level = $_SESSION['m_level'];
//query member login 
$sqlm = "SELECT m_name, m_id, m_img FROM tbl_member WHERE m_id=$m_id";
$resultm = mysqli_query($con, $sqlm);
$rowm = mysqli_fetch_array($resultm);
$m_id = $rowm['m_id'];
$m_name = $rowm['m_name'];
$m_img = $rowm['m_img'];
}
?>


<!DOCTYPE html>
<html lang="th" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="theme/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>EsseyPOS</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="theme/css/linearicons.css">
		<link rel="stylesheet" href="theme/css/font-awesome.min.css">
		<link rel="stylesheet" href="theme/css/bootstrap.css">
		<link rel="stylesheet" href="theme/css/magnific-popup.css">
		<link rel="stylesheet" href="theme/css/nice-select.css">
		<link rel="stylesheet" href="theme/css/animate.min.css">
		<link rel="stylesheet" href="theme/css/owl.carousel.css">
		<link rel="stylesheet" href="theme/css/main.css">
		<style type="text/css">
		@media print{
			#hd{
				display: none;
				}
			}
		</style>
	
	</head>
	<body>
