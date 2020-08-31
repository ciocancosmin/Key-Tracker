<?php

	include_once("config.php");


	if(isset($_POST['command']))
	{
		if($_POST['command'] == "add_new_key")
		{
			$key_name = $_POST['key_name'];
			$key_card = $_POST['key_card'];
			$key_active = $_POST['key_active'];
			if($key_active == "active") $key_active = 1;
			else if($key_active == "not_active") $key_active = 0;
			$qry2 = mysqli_query($link,"SELECT key_name FROM keys_table WHERE key_name='".$key_name."'") or die("0");
			if(mysqli_num_rows($qry2) > 0)
			{
				echo "1";
			}
			else
			{
				$qry = mysqli_query($link,"INSERT INTO keys_table (key_name,key_card,key_state,gest) VALUES ('".$key_name."','".$key_card."','".$key_active."',0)") or die("0");
				echo "2";
			}

		}
	}


?>