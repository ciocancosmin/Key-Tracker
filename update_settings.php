<?php

	include_once("config.php");

	if(isset($_POST['send_data']))
	{
		$dta = $_POST['send_data'];
		if($dta == "update_settings")
		{
			$target_user = $_POST['user'];
			$new_card = $_POST['card'];
			$new_firstname = $_POST['firstname'];
			$new_lastname = $_POST['lastname'];
			$new_active = $_POST['active'];
			$new_legitimation_id = $_POST['legitimation_id'];
			$new_level = $_POST['level'];

			if($new_active == "active") $new_active = 1;
			else if($new_active == "not_active") $new_active = 0;

			if($new_level == "normal_user") $new_level = 1;
			else if($new_level == "admin_lv_2") $new_level = 2;
			else if($new_level == "admin_lv_3") $new_level = 3;

			$change_pass_qry = "";
			if($_POST['password'] != "")
			{
				$new_pass = md5($_POST['password']);
				$change_pass_qry = ",password='".$new_pass."'";
			}
			mysqli_query($link,"UPDATE users SET card='".$new_card."',firstname='".$new_firstname."',lastname='".$new_lastname."',activ='".$new_active."',legitimation_id='".$new_legitimation_id."',level='".$new_level."'".$change_pass_qry." WHERE  username='".$target_user."' ") or die("0");
			echo "1";
		}
		if($dta == "invalidate_user")
		{
			$target_user = $_POST['user'];
			mysqli_query($link,"UPDATE users SET activ='0' WHERE username='".$target_user."' ") or die("0");
			echo "1";
		}
	}



?>