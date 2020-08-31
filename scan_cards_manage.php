<?php
	
	session_start();

	include_once("socket.php");

	include_once("cards_extract.php");

	include_once("config.php");

	function scan_cards($sock)
	{
		$server_buff = get_server($sock,"login_read","127.0.0.1",6900);
		return $server_buff;
	}

	function display_cards($arr)
	{
		for ($i=0; $i < sizeof($arr); $i++) { 
			echo $arr[$i]."////";
		}
	}

	function check_previous_cards($arr,$card)
	{
		$ret = 1;
		for ($i=0; $i < sizeof($arr); $i++) { 
			if($arr[$i] == $card)
			{
				$ret = 0;
				break;
			}
		}
		return $ret;
	}

	function check_1($arr)
	{
		$ok = 1;
		for($j = 0;$j < sizeof($arr);$j++)
		{
			$card = $arr[$j];
			for ($i=1; $i < sizeof($_SESSION['big_scan']); $i++) { 
			if(check_previous_cards($_SESSION['big_scan'][$i],$card) == 0)
			{
				$ok = 0;
				break;
			}
		}
			
		}
		
		return $ok;
	}

	function check_option($opt,$scan_tmp,$reg_user,$link)
	{
		$ret = 1;
		if($opt == 0)
		{
			for ($i=0; $i < sizeof($scan_tmp); $i++) { 
				$tmp_card = $scan_tmp[$i];
				$tmp_q = mysqli_query($link,"SELECT gest FROM keys_table WHERE key_card='".$tmp_card."'") or die("0");
				if(mysqli_num_rows($tmp_q) > 0)
				{
					$tmp_q = mysqli_fetch_array($tmp_q);
					if($tmp_q['gest'] != 0)
					{
						$ret = 0;
						echo "12";
						break;
					}
				}
			}
			return $ret;
		}
		else if($opt == 1)
		{

			for ($i=0; $i < sizeof($scan_tmp); $i++) { 
				$tmp_card = $scan_tmp[$i];
				$tmp_q = mysqli_query($link,"SELECT gest FROM keys_table WHERE key_card='".$tmp_card."'") or die("0");
				if(mysqli_num_rows($tmp_q) > 0)
				{
					$tmp_q = mysqli_fetch_array($tmp_q);
					if($tmp_q['gest'] != 0)
					{
						if($tmp_q['gest'] != $reg_user)
						{
							$ret = 0;
							echo "8";
							break;
						}
					}
					else
					{
						$ret = 0;
						echo "7";
						break;
					}
				}
			}
			return $ret;

		}
		else
		{
			return -1;
		}
	}

	if(!isset($_SESSION['big_scan'])) $_SESSION['big_scan'] = [];
	if(!isset($_SESSION['nr_scans'])) $_SESSION['nr_scans'] = 0;

	//$_SESSION['big_scan'] = [];
	
	if(isset($_POST['send_data']))
	{
		$dta = $_POST['send_data'];
		
		$user_level = 1;

		$user_id = -1;

		$qry2 = mysqli_query($link,"SELECT level,id FROM users WHERE username='".$_SESSION['logged_in']."' ") or die("0");
		if(mysqli_num_rows($qry2) > 0)
		{
			$qry2 = mysqli_fetch_array($qry2);
			$user_level = $qry2['level'];
			$user_id = $qry2['id'];
		}

		if($dta == "scan" && $user_level >= 2)
		{
			$cards_list =  trim(scan_cards($sock));
			$cards_list = extract_cards($cards_list);
			if(sizeof($cards_list) == 0)
			{
				echo "1";
			}
			else if($_SESSION['nr_scans'] > 5)
			{
				echo "13";
			}
			else
			{
				$scan_tmp = [];
				$scan_tmp2 = [];
				$found_usr = 0;
				$found_usr_value = "";
				$scan_error = 0;

				//echo sizeof($cards_list)." ";



				for ($i=0; $i < sizeof($cards_list); $i++) {
					$card = $cards_list[$i];	
					$qr = mysqli_query($link,"SELECT id,username,activ FROM users WHERE card='".$card."' ") or die("0");
					if(mysqli_num_rows($qr) > 0)
					{
						$qr = mysqli_fetch_array($qr);
						if($found_usr == 1)
						{
							echo "2";
							$scan_error = 1;
							break;
						}
						else if($qr['activ'] == 0)
						{
							echo "10";
							$scan_error = 1;
							break;
						}
						else
						{
							$found_usr = 1;
							$found_usr_value = $qr['id'];
						}
					}
					else
					{
						$qq = mysqli_query($link,"SELECT id,key_state,key_name FROM keys_table WHERE key_card='".$card."' ") or die("0");
						if(mysqli_num_rows($qq) > 0)
						{
							$qq = mysqli_fetch_array($qq);
							if($qq['key_state'] == 1)
							{
								array_push($scan_tmp, $card);
								array_push($scan_tmp2, $qq['key_name']);
							}
							else
							{
								echo "14";
								$scan_error = 1;
								break;	
							}
						}
					}

				}

				if(sizeof($_SESSION['big_scan']) == 0)
				{
					if($found_usr == 0) $do_nothing = 1;
					else
					{
						if($scan_error == 0)
						{
							array_push($_SESSION['big_scan'], $found_usr_value);	
						}
					}
				}


					if($found_usr == 0) echo "3";
					else
					{
						if($scan_error == 0)
						{

							if($found_usr_value != $_SESSION['big_scan'][0]) echo "4";
							else
							{
								if($scan_error == 0)
								{
									if(check_1($scan_tmp) == 1)
									{
										$option = -1;
										if(isset($_POST['option'])) $option = $_POST['option'];
										if(sizeof($scan_tmp) <= 20)
										{
											if(check_option($option,$scan_tmp,$_SESSION['big_scan'][0],$link))
											{
												//echo check_option($option,$scan_tmp,$_SESSION['big_scan'][0],$link);
												$_SESSION['nr_scans']++;
												array_push($_SESSION['big_scan'], $scan_tmp);
												display_cards($scan_tmp2);
											}
											
										}
										else
										{
											echo "11";
										}
										
									}
									else
									{
										echo "9";
									}
								}
							}

						}
						
					}
				

			}
		}
		else if($dta == "delete_scan" && $user_level >= 2)
		{
			if(sizeof($_SESSION['big_scan']) > 1)
			{
				array_pop($_SESSION['big_scan']);
				$_SESSION['nr_scans'] = $_SESSION['nr_scans'] - 1;
				echo "destroy";
			}
			else echo "5";
		}
		else if($dta == "send_to_user" && $user_level >= 2)
		{
			if(sizeof($_SESSION['big_scan']) > 1)
			{

				$big_tmp_arr = "";

			for ($i=1; $i < sizeof($_SESSION['big_scan']); $i++) { 
				foreach ($_SESSION['big_scan'][$i] as $card) {
					$card_name = mysqli_query($link,"SELECT id FROM keys_table WHERE key_card='".$card."'");
					if(mysqli_num_rows($card_name) > 0)
					{
						$card_name = mysqli_fetch_array($card_name);
						$card = $card_name['id'];
					}
					else $card = "";
					mysqli_query($link,"UPDATE keys_table SET gest=".$_SESSION['big_scan'][0]." WHERE id='".$card."'") or die("0");
					$big_tmp_arr.=$card.";";
				}
			}

			if($user_id != -1)
			{
				$date_now = date('Y/m/d H:i:s');
				mysqli_query($link,"INSERT INTO keys_move(tip_misc,id_user1,id_user2,id_keys,time) VALUES (0,".$user_id.",'".$_SESSION['big_scan'][0]."','".$big_tmp_arr."','".$date_now."')") or die("0");

				$_SESSION['print_scan'] = $date_now;
			}

			$_SESSION['big_scan'] = [];
			
			echo "sent";


			}
			else echo "6";

		}
		else if($dta == "get_cards" && $user_level >= 2)
		{

			if(sizeof($_SESSION['big_scan']) > 1)
			{

			$sm_err = 0;

			$big_tmp_arr = "";

			for ($i=1; $i < sizeof($_SESSION['big_scan']); $i++) {

				foreach ($_SESSION['big_scan'][$i] as $card) {
					$card_name = mysqli_query($link,"SELECT id FROM keys_table WHERE key_card='".$card."'");
					if(mysqli_num_rows($card_name) > 0)
					{
						$card_name = mysqli_fetch_array($card_name);
						$card = $card_name['id'];
					}
					else $card = "";
					mysqli_query($link,"UPDATE keys_table SET gest=0 WHERE id='".$card."'") or die("0"); 
					$big_tmp_arr.=$card.";";
				}
			}

			if($user_id != -1)
			{
				$date_now = date('Y/m/d H:i:s');
				mysqli_query($link,"INSERT INTO keys_move(tip_misc,id_user1,id_user2,id_keys,time) VALUES (1,".$user_id.",'".$_SESSION['big_scan'][0]."','".$big_tmp_arr."','".$date_now."')") or die("0");

				$_SESSION['print_scan'] = $date_now;
			}

			if($sm_err == 0)
			{
				$_SESSION['big_scan'] = [];

				echo "sent";
			}

			}
			else echo "6";

		}
		else if($dta == "refresh_sess" && $user_level >= 2)
		{
			$_SESSION['big_scan'] = [];
			$_SESSION['nr_scans'] = 0;
		}
		else if($dta == "print_scan" && $user_level >= 2)
		{
			if(isset($_SESSION['print_scan']))
			{
				$qry4 = mysqli_query($link,"SELECT * FROM keys_move WHERE time='".$_SESSION['print_scan']."'");
				if(mysqli_num_rows($qry4) > 0)
				{
					$qry4 = mysqli_fetch_array($qry4);
					$usr1 = mysqli_query($link,"SELECT firstname,lastname FROM users WHERE id='".$qry4['id_user1']."'");
					$usr2 = mysqli_query($link,"SELECT firstname,lastname FROM users WHERE id='".$qry4['id_user2']."'");
					if(mysqli_num_rows($usr1) > 0) $usr1 = mysqli_fetch_array($usr1);
					if(mysqli_num_rows($usr2) > 0) $usr2 = mysqli_fetch_array($usr2);
					if($qry4['tip_misc'] == 1)
					{
						$aux = $usr1;
						$usr1 = $usr2;
						$usr2 = $aux;
					}
					$keys = "";
					$keys_arr = explode(";", $qry4['id_keys']);
					for ($i=0; $i < sizeof($keys_arr)-1; $i++) { 
						$key_name_select = mysqli_query($link,"SELECT key_name FROM keys_table WHERE id='".$keys_arr[$i]."'");
						if(mysqli_num_rows($key_name_select) > 0) $key_name_select = mysqli_fetch_array($key_name_select);
						$keys.=$key_name_select['key_name']."----";
					}

					$keys = str_replace(" ", "***", $keys);

					$send_time = explode(" ", $qry4['time']);

					$send_to_py = $qry4['id']."/*/".$send_time[0]."/*/".$usr1['firstname']."/*/".$usr1['lastname']."/*/".$usr2['firstname']."/*/".$usr2['lastname']."/*/".$keys."/*/".$send_time[1];
					shell_exec("sudo /usr/bin/python /home/pi/Python-Thermal-Printer/printphp.py ".$send_to_py);
					echo $send_to_py;
				}
			}
		}

	}

?>