<?php
	
	include_once("config.php");

	if(isset($_POST['command']))
	{
		$cmd = $_POST['command'];
		$new_key_name = $_POST['key_name'];
		$new_key_card = $_POST['key_card'];
		$new_key_state = $_POST['key_active'];
		if($new_key_state == "active") $new_key_state = 1;
		else if($new_key_state == "not_active") $new_key_state = 0;
		$key_id = $_POST['key_id'];
		if($cmd == "update_key")
		{
			//$qry2 = mysqli_query($link,"SELECT key_name FROM keys_table WHERE key_name='".$new_key_name."'") or die("0");
			//if(mysqli_num_rows($qry2) > 0) echo "1";
			//else
			//{
				mysqli_query($link,"UPDATE keys_table SET key_name='".$new_key_name."',key_card='".$new_key_card."',key_state='".$new_key_state."' WHERE id='".$key_id."' ") or die("0");
			//}
		}
	}


?>