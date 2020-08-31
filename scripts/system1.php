<?php
function current_time()	
{
$current_time = exec("date +'%d %b %Y %T %Z'");
echo $current_time;
}
function uptime()	
{	
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
	echo $uptime;	
}	
function hostname()	
{
	$host = exec('hostname -f');
	echo $host;
}
function cpu_model()	
{
	$processor = str_replace("-compatible processor", "", explode(": ", exec("cat /proc/cpuinfo | grep model"))[1]);
	echo $processor;
}
?>
    <div class="row row0" >
	<div class="Title"><img src="img/uptime.png" alt="Uptime"> &nbsp;System</div>
	<div class="Text">
	<p>System time: <b><?php current_time();?></b></p>
	<p>Uptime: <b><?php uptime();?></b></p>
	<p>System name: <b><?php hostname();?></b></p>
	<p>Processor: <b><?php cpu_model();?></b></p>
	<p></p>
		</div>
	</div>
	<p><button class="btn btn-outline-danger btn-sm" style="align:center;" onclick="reboot();">Reboot system</button></p>