<?php

	session_start();

	if(!isset($_SESSION['logged_in'])) $_SESSION['logged_in'] = "n0n3";

	include_once("socket.php");
	include_once("config.php");


	if(!$link) //!!!
	{
		die("0");
	}

	if(isset($_POST['post_data']))
	{
		$receive_data = $_POST['post_data'];
		$data_split = explode(";", $receive_data);
		if($data_split[0] == "" || $data_split[1] == "")
		{
			//check login card
			send_to_server($sock,"login_read","127.0.0.1",6900);
			$buf = "";
			$bytes = socket_recv($sock, $buf, 1024, MSG_WAITALL);

			//card split

			$cards_list_unsplit = $buf;
			$cards_list_unsplit = trim($cards_list_unsplit);

			if($cards_list_unsplit[0] == "[") $cards_list_unsplit = substr($cards_list_unsplit, 1);
			if($cards_list_unsplit[ strlen($cards_list_unsplit) - 1  ] == "]") $cards_list_unsplit = substr($cards_list_unsplit, 0, -1);

			$cards_list_split = explode(",", $cards_list_unsplit);

			$ok_login = 0;

			$tmp_username = "";

			$ok_login_2 = 0;

			foreach ($cards_list_split as $key) {
				$item_split_list = explode("'", $key);
				$card_code = $item_split_list[1];
				$s_qry = mysqli_query($link,"SELECT username,activ FROM users WHERE card = '".$card_code."'");
				if(mysqli_num_rows($s_qry) > 0)
				{
					if($ok_login)
					{
						$ok_login_2 = 1;
						break;
					}
					$s_qry = mysqli_fetch_array($s_qry);
					if($s_qry['activ'] == 1)
					{
						$tmp_username = $s_qry['username'];
						//$_SESSION['logged_in'] = $s_qry['username'];
						$ok_login = 1;
					}
				}

			}

			//sleep(3);

			if($ok_login == 0) echo "2";
			else if($ok_login == 1 && $ok_login_2 == 1) echo "4";
			else if($ok_login == 1 && $ok_login_2 == 0)
			{
				$_SESSION['logged_in'] = $tmp_username;
				echo "success";
			}

			//send_to_server($sock,"close_server","127.0.0.1",6900);
			//echo "1";
		}
		else
		{
			$qry = mysqli_query($link,"SELECT password,activ FROM users WHERE username = '".$data_split[0]."'");
			if(mysqli_num_rows($qry) > 0)
			{
				$qry = mysqli_fetch_array($qry);
				if($qry['password'] == md5($data_split[1]))
				{
					if($qry['activ'] == 1)
					{
						$_SESSION['logged_in'] = $data_split[0];
						echo "success";
					}
					else
					{
						echo "3";
					}
				}
				else
				{
					echo "1";
				}
			}
			else
			{
				echo "1";
			}
		}
	}

?>
