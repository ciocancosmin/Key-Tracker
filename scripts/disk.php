	<hr class="row4">
	<div class="row row5">
	<div class="Title"><img src="img/sd.png" alt="SD card"> &nbsp;Disk usage</div>
	<div class="Text">
<?php
function formatBytes($bytes, $precision = 2) {
    if ($bytes > pow(1024,3)) return round($bytes / pow(1024,3), $precision)."GB";
    else if ($bytes > pow(1024,2)) return round($bytes / pow(1024,2), $precision)."MB";
    else if ($bytes > 1024) return round($bytes / 1024, $precision)."KB";
    else return ($bytes)."B";
}
function net_info()
{
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
	$info_net= array($net_mtu,$net_tx_ok,$net_rx_ok,$net_rx_err,$net_tx_err);
	return ($info_net);
	//	var_dump($info_net);
}
		exec("df -T -l -BKB -x tmpfs -x devtmpfs -x rootfs", $diskfree);
	$count = 1;
	while ($count < sizeof($diskfree))
	{
		list($drive[$count], $typex[$count], $size[$count], $used[$count], $avail[$count], $percent[$count], $mount[$count]) = preg_split('/\s+/', $diskfree[$count]);
		$percent_part[$count] = str_replace( "%", "", $percent[$count]);
		$count++;
	}
		for($i = 1;$i<$count;$i++)
		{
			$total = human_filesize(intval(preg_replace("/[^0-9]/", "", trim($size[$i])))*1024,0);
			$usedspace = human_filesize(intval(preg_replace("/[^0-9]/", "", trim($used[$i])))*1024,0);
			$freespace = human_filesize(intval(preg_replace("/[^0-9]/", "", trim($avail[$i])))*1024,0);
			echo '<div class="Text"><p><b>'.$drive[$i].'</b> Used: <b>'.$usedspace.'</b> (<b>'.$percent[$i].'</b>) Free: <b>'.$freespace.'</b> Total: <b>'.$total.'</b></p><p></p>';
			echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuemax="100" aria-valuenow="'.$percent[$i].'" style="width: '.$percent[$i].';">'.$percent[$i].'</div></div>';
			echo '</div>';
		}
?>
	</div>
	</div>