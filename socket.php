<?php

	$ip_address = "127.0.0.1";
	$port = 6900;

	$buffer_size = 1024;

	$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("0");

	function send_to_server($sock,$message,$ip_address,$port)
	{
		socket_connect($sock, $ip_address, $port) or die("0");

		socket_write($sock, $message, strlen($message)) or die("0");
	}


	function get_server($sock,$message,$ip_address,$port)
	{
		socket_connect($sock, $ip_address, $port) or die("0");

		socket_write($sock, $message, strlen($message)) or die("0");

		$buff = "";

		$bytes = socket_recv($sock, $buff, 1024, MSG_WAITALL);

		return $buff;

	}	
	

?>