<?php

	session_start();

	include_once("config.php");

	if(isset($_POST['send_data'])) 
	{
		$data = $_POST['send_data'];
		$data_split = explode("///", $data);
		$qry = mysqli_query($link,"SELECT password FROM users WHERE username = '".$_SESSION['logged_in']."'");
		if(mysqli_num_rows($qry) > 0)
		{
			$qry = mysqli_fetch_array($qry);
			if(md5($data_split[0]) == $qry['password'])
			{
				$new_pass = md5($data_split[1]);
				if( mysqli_query($link,"UPDATE users SET password='".$new_pass."' WHERE username='".$_SESSION['logged_in']."' ") ) echo "success";
				else echo "0";
			}
			else echo "1";
		}
		else echo "0";
	}


?>