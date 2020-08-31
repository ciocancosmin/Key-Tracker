<?php

	session_start();

	include_once("config.php");

	if(isset($_SESSION['logged_in']))
	{
		if($_SESSION['logged_in'] != "n0n3")
		{
			$username = $_SESSION['logged_in'];
			$qry = mysqli_query($link,"SELECT level FROM users WHERE username = '".$username."'");
			$qry = mysqli_fetch_array($qry);
			$user_level = $qry['level'];
			echo $user_level;
		}
		else echo "0";
	}
	else echo "0";



?>