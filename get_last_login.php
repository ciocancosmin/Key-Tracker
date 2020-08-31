<?php

	session_start();

	include_once("config.php");

	if(isset($_POST['send_data']))
	{

		$dta = $_POST['send_data'];
		if($dta == "get_data")
		{
			$qry2 = mysqli_query($link,"SELECT last_login_day,last_login_hour,last_login_ip FROM users WHERE username = '".$_SESSION['logged_in']."'") or die("0");
			if(mysqli_num_rows($qry2) > 0)
				{
					$qry2 = mysqli_fetch_array($qry2);
					$last_login_day = explode(";",$qry2['last_login_day']);
					$last_login_hour = explode(";",$qry2['last_login_hour']);
					$last_login_ip = explode(";",$qry2['last_login_ip']);
					echo $last_login_day[0]."////".$last_login_hour[0]."////".$last_login_ip[0];
				} 
		}

	}



?>