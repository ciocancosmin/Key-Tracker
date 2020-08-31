	<div class="row row7">
	<div class="Title"><img src="img/daemons.png" alt="Servers"> &nbsp;Services</div>
	<div class="Text" id="Text6">
	<p></p>
	<table class="table table-striped table-responsive" id="sys6">
	<td colspan="2"><p>Services</p></td>
	<td><p>Loaded</p></td>
	<td><p>Active</p></td>
	<td><p>Running</p></td>
	<td><p>Action</p></td>
	</tr>
<?php 
	function services_info($service)
	{
		$service_array = preg_split('/\s+/', exec("systemctl --type=service --state=running | grep ".$service));
		if (isset($service_array[1])){$service_loaded = $service_array[1];}
		else {$service_loaded='no';}
		if (isset($service_array[2])){$service_active = $service_array[2];}
		else {$service_active='no';}
		if (isset($service_array[3])){$service_run = $service_array[3];}
		else {$service_run='no';}
		$info_service= array($service_loaded,$service_active,$service_run);
		return ($info_service);
	}
	$servicii = array('ssh','apache2','mariadb','reader','printer','kiosk','smbd','iptables');
	for ($i = 0; $i <= (count($servicii)-1); $i++) {
		$service = $servicii[$i];
		$info_service =services_info($service);
		echo '<tr><td>';
		echo '<img src="../img/'.$servicii[$i].'.png"></td>';
		echo '<td class="align-middle">'.$servicii[$i].' :</td>';
		echo '<td class="align-middle">';
		if ($info_service[0] <> 'loaded')
			{echo '<img src="../img/cancel16.png">';}
			else
			{echo '<img src="../img/check16.png">';}
		echo '</td>';
		echo '<td class="align-middle">';
		if ($info_service[1] <> 'active')
			{echo '<img src="../img/cancel16.png">';}
			else {echo '<img src="../img/check16.png">';}
			echo '</td>';
			echo '<td class="align-middle">';
		if ($info_service[2] <> 'running')
			{echo '<img src="../img/cancel16.png">';}
			else {echo '<img src="../img/check16.png">';}
		echo '</td>';
		echo '<td class="align-middle">';
		if ($info_service[2] <> 'running')
			{echo '<img src="../img/start.png" style="cursor:pointer;cursor:hand;" onclick="ch_service(\''.$servicii[$i].'\',\'start\');">';}
			else {echo '<img src="../img/stop.png" style="cursor:pointer;cursor:hand;" onclick="ch_service(\''.$servicii[$i].'\',\'stop\');">';}
		echo '</td>';
		echo '</tr>';	
}
?>
	</table>
	<p></p>
	</div>	
	</div>