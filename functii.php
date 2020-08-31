<?php
	function human_filesize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
	
	$current_time = exec("date +'%d %b %Y %T %Z'");
	$frequency = exec("cat /sys/devices/system/cpu/cpu0/cpufreq/scaling_cur_freq") / 1000;
	$processor = str_replace("-compatible processor", "", explode(": ", exec("cat /proc/cpuinfo | grep model"))[1]);
	$temperature = round(exec("cat /sys/class/thermal/thermal_zone0/temp ") / 1000, 1);
	$model = trim(exec('cat /sys/firmware/devicetree/base/model'));
//	$RX = exec("sudo ifconfig eth0 | grep 'RX bytes'| cut -d: -f2 | cut -d' ' -f1");
//	$TX = exec("sudo ifconfig eth0 | grep 'TX bytes'| cut -d: -f3 | cut -d' ' -f1");
	//echo $RX;
	//echo $TX;
	list($system, $host, $kernel) = preg_split('/\s/', exec("uname -a"), 4);
	$host = exec('hostname -f');

	//CPU voltage
	$voltage = shell_exec("sudo /opt/vc/bin/vcgencmd measure_volts | tail -n 1| grep -oP 'volt=\s*\K\d...'");
//	var_dump($voltage);
	
	//Uptime
	$uptime_array = explode(" ", exec("cat /proc/uptime"));
	$seconds = round($uptime_array[0], 0);
	$minutes = $seconds / 60;
	$hours = $minutes / 60;
	$days = floor($hours / 24);
	$hours = sprintf('%02d', floor($hours - ($days * 24)));
	$minutes = sprintf('%02d', floor($minutes - ($days * 24 * 60) - ($hours * 60)));
	if ($days == 0):
		$uptime = $hours . ":" .  $minutes . " (hh:mm)";
	elseif($days == 1):
		$uptime = $days . " day, " .  $hours . ":" .  $minutes . " (hh:mm)";
	else:
		$uptime = $days . " days, " .  $hours . ":" .  $minutes . " (hh:mm)";
	endif;
	
// Load averages
	function load_averages()
	{
	    if ( file_exists('/proc/loadavg') )
		{
         $data = file_get_contents('/proc/loadavg');
         $loads = explode(' ', $data);
		}
		return $loads;
	}
	
	$l = load_averages();
	
	//Memory Utilisation
	$meminfo = file("/proc/meminfo");
	for ($i = 0; $i < count($meminfo); $i++)
	{
		list($item, $data) = preg_split('/:/', $meminfo[$i], 2);
		$item = trim(chop($item));
		$data = intval(preg_replace("/[^0-9]/", "", trim(chop($data)))); //Remove non numeric characters
		switch($item)
		{
			case "MemTotal": $total_mem = $data; break;
			case "MemFree": $free_mem = $data; break;
			case "SwapTotal": $total_swap = $data; break;
			case "SwapFree": $free_swap = $data; break;
			case "Buffers": $buffer_mem = $data; break;
			case "Cached": $cache_mem = $data; break;
			default: break;
		}
	}
	$used_mem = $total_mem - $free_mem;
	$used_swap = $total_swap - $free_swap;
	$percent_free = round(($free_mem / $total_mem) * 100);
	$percent_used = round(($used_mem / $total_mem) * 100);
	if ($total_swap) {
	    $percent_swap = round((($total_swap - $free_swap ) / $total_swap) * 100);
	    $percent_swap_free = round(($free_swap / $total_swap) * 100);
	}else{
	    $percent_swap = 0;
	    $percent_swap_free = 0;
	}
	$percent_buff = round(($buffer_mem / $total_mem) * 100);
	$percent_cach = round(($cache_mem / $total_mem) * 100);
	$used_mem = human_filesize($used_mem*1024,0);
	$used_swap = human_filesize($used_swap*1024,0);
	$total_mem = human_filesize($total_mem*1024,0);
	$free_mem = human_filesize($free_mem*1024,0);
	$total_swap = human_filesize($total_swap*1024,0);
	$free_swap = human_filesize($free_swap*1024,0);
	$buffer_mem = human_filesize($buffer_mem*1024,0);
	$cache_mem = human_filesize($cache_mem*1024,0);
	
	//Disk space check, with sizes reported in kB
	exec("df -T -l -BKB -x tmpfs -x devtmpfs -x rootfs", $diskfree);
	$count = 1;
	while ($count < sizeof($diskfree))
	{
		list($drive[$count], $typex[$count], $size[$count], $used[$count], $avail[$count], $percent[$count], $mount[$count]) = preg_split('/\s+/', $diskfree[$count]);
		$percent_part[$count] = str_replace( "%", "", $percent[$count]);
		$count++;
	}

function formatBytes($bytes, $precision = 2) {
    if ($bytes > pow(1024,3)) return round($bytes / pow(1024,3), $precision)."GB";
    else if ($bytes > pow(1024,2)) return round($bytes / pow(1024,2), $precision)."MB";
    else if ($bytes > 1024) return round($bytes / 1024, $precision)."KB";
    else return ($bytes)."B";
}

	//network traffic
	$net_array = preg_split('/\s+/', exec("ifconfig -s eth0"));
	$net_mtu = $net_array[1];
	$net_rx_ok = $net_array[2]*1024;
	$net_rx_ok = formatBytes($net_rx_ok);
	$net_rx_err = $net_array[3]*1024;
	$net_rx_err = formatBytes($net_rx_err);
	$net_tx_ok = $net_array[6]*1024;
	$net_tx_ok = formatBytes($net_tx_ok);
	$net_tx_err = $net_array[7]*1024;
	$net_tx_err = formatBytes($net_tx_err);
//	var_dump($net_array);


	$services_ssh_array = preg_split('/\s+/', exec("systemctl | grep ssh"));
	if (isset($services_ssh_array[1])){$services_ssh_loaded = $services_ssh_array[1];}
	else {$services_ssh_loaded='no';}
	if (isset($services_ssh_array[2])){$services_ssh_active = $services_ssh_array[2];}
	else {$services_ssh_active='no';}
	if (isset($services_ssh_array[3])){$services_ssh_run = $services_ssh_array[3];}
	else {$services_ssh_run='no';}

	$services_http_array = preg_split('/\s+/', exec("systemctl | grep apache2"));
	if (isset($services_http_array[1])){$services_http_loaded = $services_http_array[1];}
	else {$services_http_loaded='no';}
	if (isset($services_http_array[2])){$services_http_active = $services_http_array[2];}
	else {$services_http_active='no';}
	if (isset($services_http_array[3])){$services_http_run = $services_http_array[3];}
	else {$services_http_run='no';}

	$services_mysql_array = preg_split('/\s+/', exec("systemctl | grep mariadb"));
	if (isset($services_mysql_array[1])){$services_mysql_loaded = $services_mysql_array[1];}
	else {$services_mysql_loaded='no';}
	if (isset($services_mysql_array[2])){$services_mysql_active = $services_mysql_array[2];}
	else {$services_mysql_active='no';}
	if (isset($services_mysql_array[3])){$services_mysql_run = $services_mysql_array[3];}
	else {$services_mysql_run='no';}


	$services_reader_array = preg_split('/\s+/', exec("systemctl | grep reader"));
	if (isset($services_reader_array[1])){$services_reader_loaded = $services_reader_array[1];}
	else {$services_reader_loaded='no';}
	if (isset($services_reader_array[2])){$services_reader_active = $services_reader_array[2];}
	else {$services_reader_active='no';}
	if (isset($services_reader_array[3])){$services_reader_run = $services_reader_array[3];}
	else {$services_reader_run='no';}
	
	$services_printer_array = preg_split('/\s+/', exec("systemctl | grep printer"));
	if (isset($services_printer_array[1])){$services_printer_loaded = $services_printer_array[1];}
	else {$services_printer_loaded='no';}
	if (isset($services_printer_array[2])){$services_printer_active = $services_printer_array[2];}
	else {$services_printer_active='no';}
	if (isset($services_printer_array[3])){$services_printer_run = $services_printer_array[3];}
	else {$services_printer_run='no';}
	
	$services_kiosk_array = preg_split('/\s+/', exec("systemctl | grep kiosk"));
	if (isset($services_kiosk_array[1])){$services_kiosk_loaded = $services_kiosk_array[1];}
	else {$services_kiosk_loaded='no';}
	if (isset($services_kiosk_array[2])){$services_kiosk_active = $services_kiosk_array[2];}
	else {$services_kiosk_active='no';}
	if (isset($services_kiosk_array[3])){$services_kiosk_run = $services_kiosk_array[3];}
	else {$services_kiosk_run='no';}	
	
	$services_iptables_array = preg_split('/\s+/', exec("systemctl | grep iptables"));
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