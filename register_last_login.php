<?php

	session_start();

	include_once("config.php");


	if(isset($_POST['send_data']))
	{
		$dta = $_POST['send_data'];
		if($dta == "register")
		{
			$curr_ip = $_SERVER['REMOTE_ADDR'];
			$curr_date = date("Y-m-d");
			$curr_hour = date('H:i');
			$qry2 = mysqli_query($link,"SELECT last_login_day,last_login_hour,last_login_ip FROM users WHERE username = '".$_SESSION['logged_in']."'") or die("0");
			if(mysqli_num_rows($qry2) > 0)
			{

				$qry2 = mysqli_fetch_array($qry2);
				$last_login_day_arr = explode(";", $qry2['last_login_day']);
				$last_login_ip_arr = explode(";", $qry2['last_login_ip']);
				$last_login_hour_arr = explode(";", $qry2['last_login_hour']);
				$new_last_login_day = "";
				$new_last_login_ip = "";
				$new_last_login_hour = "";

				if(sizeof($last_login_day_arr) > 1)
				{
					$new_last_login_day = $last_login_day_arr[1].";".$curr_date;
				}
				else
				{
					$new_last_login_day = $curr_date.";".$curr_date;
				}

				if(sizeof($last_login_ip_arr) > 1)
				{
					$new_last_login_ip = $last_login_ip_arr[1].";".$curr_ip;
				}
				else
				{
					$new_last_login_ip = $curr_ip.";".$curr_ip;
				}

				if(sizeof($last_login_hour_arr) > 1)
				{
					$new_last_login_hour = $last_login_hour_arr[1].";".$curr_hour;
				}
				else
				{
					$new_last_login_hour = $curr_hour.";".$curr_hour;
				}

				mysqli_query($link,"UPDATE users SET last_login_day='".$new_last_login_day."',last_login_hour='".$new_last_login_hour."',last_login_ip='".$new_last_login_ip."' WHERE username='".$_SESSION['logged_in']."' ") or die("0");

			}
		}
	}



?>