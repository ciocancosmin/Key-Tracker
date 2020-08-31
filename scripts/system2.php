<?php
function cpu_freq()	
{
	$frequency = exec("cat /sys/devices/system/cpu/cpu0/cpufreq/scaling_cur_freq") / 1000;
	echo $frequency;
}
function cpu_volt()	
{
	$voltage = shell_exec("sudo /opt/vc/bin/vcgencmd measure_volts | tail -n 1| grep -oP 'volt=\s*\K\d...'");
	echo $voltage;
}
?>
<p>CPU frequency: <b><?php cpu_freq();?>MHz</b> Voltage: <b><?php cpu_volt();?>V</b></p><p>Scaling governor: <b>ondemand</b></p>
