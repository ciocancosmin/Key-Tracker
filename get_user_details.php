<?php

	include_once("config.php");

	if(isset($_POST['user_id']))
	{
		$target_id = $_POST['user_id'];
		$qry = mysqli_query($link,"SELECT username,firstname,lastname,card,legitimation_id,activ,level FROM users WHERE id='".$target_id."' ") or die("0");
		if(mysqli_num_rows($qry) > 0)
		{
			$row = mysqli_fetch_array($qry);
			echo $row['username'].";".$row['firstname'].";".$row['lastname'].";".$row['card'].";".$row['legitimation_id'].";".$row['activ'].";".$row['level']."////";
		}
		else echo "1";
	}



?>