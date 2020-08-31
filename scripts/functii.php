<?php
	$services_ssh_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep ssh"));
	if (isset($services_ssh_array[1])){$services_ssh_loaded = $services_ssh_array[1];}
	else {$services_ssh_loaded='no';}
	if (isset($services_ssh_array[2])){$services_ssh_active = $services_ssh_array[2];}
	else {$services_ssh_active='no';}
	if (isset($services_ssh_array[3])){$services_ssh_run = $services_ssh_array[3];}
	else {$services_ssh_run='no';}

	$services_http_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep apache2"));
	if (isset($services_http_array[1])){$services_http_loaded = $services_http_array[1];}
	else {$services_http_loaded='no';}
	if (isset($services_http_array[2])){$services_http_active = $services_http_array[2];}
	else {$services_http_active='no';}
	if (isset($services_http_array[3])){$services_http_run = $services_http_array[3];}
	else {$services_http_run='no';}

	$services_mysql_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep mariadb"));
	if (isset($services_mysql_array[1])){$services_mysql_loaded = $services_mysql_array[1];}
	else {$services_mysql_loaded='no';}
	if (isset($services_mysql_array[2])){$services_mysql_active = $services_mysql_array[2];}
	else {$services_mysql_active='no';}
	if (isset($services_mysql_array[3])){$services_mysql_run = $services_mysql_array[3];}
	else {$services_mysql_run='no';}


	$services_reader_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep reader"));
	if (isset($services_reader_array[1])){$services_reader_loaded = $services_reader_array[1];}
	else {$services_reader_loaded='no';}
	if (isset($services_reader_array[2])){$services_reader_active = $services_reader_array[2];}
	else {$services_reader_active='no';}
	if (isset($services_reader_array[3])){$services_reader_run = $services_reader_array[3];}
	else {$services_reader_run='no';}
	
	$services_printer_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep printer"));
	if (isset($services_printer_array[1])){$services_printer_loaded = $services_printer_array[1];}
	else {$services_printer_loaded='no';}
	if (isset($services_printer_array[2])){$services_printer_active = $services_printer_array[2];}
	else {$services_printer_active='no';}
	if (isset($services_printer_array[3])){$services_printer_run = $services_printer_array[3];}
	else {$services_printer_run='no';}
	
	$services_kiosk_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep kiosk"));
	if (isset($services_kiosk_array[1])){$services_kiosk_loaded = $services_kiosk_array[1];}
	else {$services_kiosk_loaded='no';}
	if (isset($services_kiosk_array[2])){$services_kiosk_active = $services_kiosk_array[2];}
	else {$services_kiosk_active='no';}
	if (isset($services_kiosk_array[3])){$services_kiosk_run = $services_kiosk_array[3];}
	else {$services_kiosk_run='no';}	
	
	$services_iptables_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep iptables"));
	if (isset($services_iptables_array[1])){$services_iptables_loaded = $services_iptables_array[1];}
	else {$services_iptables_loaded='no';}
	if (isset($services_iptables_array[2])){$services_iptables_active = $services_iptables_array[2];}
	else {$services_iptables_active='no';}
	if (isset($services_iptables_array[3])){$services_iptables_run = $services_iptables_array[3];}
	else {$services_iptables_run='no';}	
	
	
	//var_dump($services_reader_array);

	
	exec("ifconfig -s eth0",$network);
//	var_dump($network);
	$my_current_ip=exec("ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
//	echo $my_current_ip;
	
?>