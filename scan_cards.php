<?php

	include_once("socket.php");

	include_once("cards_extract.php");

	include_once("config.php");

	function scan_cards($sock)
	{
		$server_buff = get_server($sock,"login_read","127.0.0.1",6900);
		return $server_buff;
	}
	
	if(isset($_POST['send_data']))
	{
		$dta = $_POST['send_data'];
		if($dta == "read_cards")
		{
			$cards_list =  trim(scan_cards($sock));
			$cards_list = extract_cards($cards_list);
			if(sizeof($cards_list) == 1)
			{
				$target_card = $cards_list[0];
				$qry = mysqli_query($link,"SELECT card FROM users WHERE card = '".$target_card."'");
				$qry2 = mysqli_query($link,"SELECT key_card FROM keys_table WHERE key_card = '".$target_card."'");
				if(mysqli_num_rows($qry) > 0)
				{
					echo "1";
				}
				else if(mysqli_num_rows($qry2) > 0)
				{
					echo "1";
				}
				else
				{
					echo $target_card;
				}
			}
			else
			{
				if(sizeof($cards_list) > 1) echo "2";
				else if(sizeof($cards_list) == 0) echo "3";

			}
		}	
	}

?>