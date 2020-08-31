<?php

	session_start();

	include_once("link.php");

	if(isset($_POST['send_data']))
	{

		if( $_POST['send_data'] == "get_users" )
		{
			$qry_limit = intval($_POST['finish']) - intval($_POST['start']);
			$qry = mysqli_query($link,"SELECT username,firstname,lastname,card FROM users WHERE activ=1 AND (level=1 OR level=2) LIMIT ".$qry_limit." OFFSET ".$_POST['start']." ") or die("0");
			while($row = mysqli_fetch_assoc($qry))
			{
				echo $row['username'].";".$row['firstname'].";".$row['lastname'].";".$row['card']."////";
			}

		}

	}

?>