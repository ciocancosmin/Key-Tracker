<head>
	<title>Key Tracker Reboot</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="shortcut icon" type="image/x-icon" href='../img/favicon.png'>
	<script src="../js/tech.js"></script>
</head>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="main_login_div" style="width:360px;" class="border border-info rounded">
			<p><img src="../img/reboot.png"></p>
			<p>Do you restart Key Tracker Machine?</p>
			<p>
			<button class="btn btn-outline-info btn-sm" style="align:center;width:100px;" onClick="reboot()">Reboot</button>&nbsp;&nbsp;
			<button class="btn btn-outline-danger btn-sm" style="align:center;width:100px;" onClick="cancel_reboot()">Cancel</button>
			</p>
			<div class="loader"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>