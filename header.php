<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Key Tracker">
  <meta name="author" content="">
  <meta http-equiv="Cache-control" content="public">
    <?php
    header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Pragma: no-cache");
	include_once('config.php');
	?>
  <title>Key Tracker <?php if (isset($title)) {echo $title;}?></title>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script type="text/javascript" src="js/logout.js"></script>
  <script type="text/javascript" src="js/redirect.js"></script>
  <script type="text/javascript" src="js/user.js"></script>
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<?php if (isset($title) && $title=='Admin'){echo '<script type="text/javascript" src="js/small_admin.js"></script>';} ?>
    <?php if (isset($title) && $title=='HighUser'){echo '<script type="text/javascript" src="js/gest.js"></script>';} ?>
	<?php if (isset($title) && $title=='Tech')
	{
	echo '<link href="css/tech.css" rel="stylesheet">';
	echo '<link href="css/button.css" rel="stylesheet">';
	echo '<script src="js/raphael-2.1.4.min.js"></script>';
	echo '<script src="js/justgage.js"></script>';
	echo '<script src="js/tech.js"></script>';
	}
	?>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/user_interface.css" rel="stylesheet" type="text/css">
  <link href="css/admin.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link rel="shortcut icon" type="image/x-icon" href='img/favicon.png'>
<script>
function update_last_login()
{
		$.ajax({
	        type: "POST",
	        url: "get_last_login.php",
	        data: {send_data:"get_data"},
	        success: function(data){
	        	splt = data.split("////");
	        	$("#last_login_date").html($("#last_login_date").html() + splt[0]);
	        	$("#last_login_hour").html($("#last_login_hour").html() + splt[1]);
	        	$("#last_login_ip").html($("#last_login_ip").html() + splt[2]);
	        }
	    });
}
$( document ).ready(function() {
  update_last_login();
});  
</script>
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <img src="img/key64.png" id="main_logo_icon">
    <a class="navbar-brand mr-1" href="" style="font-size:28px;"><i>Key Tracker </i><?php echo $version;?></a>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group"></div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
	<li class="nav-item dropdown no-arrow">
	<?php if ($title <> 'Tech')
	{
 	 echo '<div class="btn btn-sm1 btn-info" onclick="show_change_pass();" id="logout_btn" style="width:90px;height:90px;">
	 <img src="img/pass48.png" type="image/gif" sizes="48x48">
	 <p style="font-size:24px;">Parola</p>
	 </div>';
	}
	?>
	<div class="btn btn-sm1 btn-info" onclick="logout();" id="logout_btn" style="width:90px;height:90px;">
	<img src="img/logout48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Iesire</p>
	</div>
	</li>
  </nav>
    <div id="wrapper">
	    <div class="container-fluid">
		<p></p>
		<ol class="breadcrumb">
		<li class="breadcrumb-item active" id="user_welcome_message" style="font-size:22px;"></li>
		<li class="breadcrumb-item active" id="last_login_date" style="font-size:22px;">Accesare: Data </li>
		<li class="breadcrumb-item active" id="last_login_hour">Ora </li>
		<li class="breadcrumb-item active" id="last_login_ip" style="font-size:22px;">IP: </li>
        </ol>
	    <hr>
