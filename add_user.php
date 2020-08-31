<?php

	session_start();

	include_once("config.php");

	include_once("socket.php");

	include_once("cards_extract.php");

	if(isset($_POST['send_data']))
	{
		$dta = explode("////", $_POST['send_data']);
		$add_username = $dta[0];
		$add_password = $dta[1];
		$add_firstname = $dta[2];
		$add_lastname = $dta[3];
		$add_user_legitimation_id = $dta[4];
		$add_user_card = $dta[5];
		$add_user_type = $dta[6];
		$add_user_activity = $dta[7];
		if(isset($_SESSION['logged_in']))
		{
			$qry1 = mysqli_query($link,"SELECT level FROM users WHERE username = '".$_SESSION['logged_in']."'") or die("0");
			if(mysqli_num_rows($qry1) > 0)
			{
				$qry1 = mysqli_fetch_array($qry1);
				$lvl = intval($qry1['level']);
				$okk = 0;
				$qry2 = mysqli_query($link,"SELECT username FROM users WHERE username = '".$add_username."'") or die("0");
				if(mysqli_num_rows($qry2) > 0)
				{
					$qry2 = mysqli_fetch_array($qry2);
					if($qry2['username'] == $add_username) $okk = 1;
				} 
				if($lvl > 2 && $okk == 0)
				{
					//echo $add_username." ".md5($add_password);
					$add_level = 1;
					$add_active = 1;
					if($add_user_activity == "not_active") $add_active = 0;
					if($add_user_type == "admin_lv_2") $add_level = 2;
					else if($add_user_type == "admin_lv_3") $add_level = 3;
					mysqli_query($link,"INSERT INTO users(username,password,level,activ,card,firstname,lastname,legitimation_id,last_login_day,last_login_hour,last_login_ip) VALUES ('".$add_username."','".md5($add_password)."',".$add_level.",".$add_active.",'".$add_user_card."','".$add_firstname."','".$add_lastname."','".$add_user_legitimation_id."','','','')") or die("0");
					echo "success";
				}
				else if($okk == 1) echo "1";
			}
		}
	}


?>