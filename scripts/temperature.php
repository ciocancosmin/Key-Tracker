<?php
$temperature1 = round(exec("cat /sys/class/thermal/thermal_zone0/temp ") / 1000, 1);
$temperature2 = 50;
$temperature3 = 75;
$valori = array(
	'cpu_temp' => $temperature1,
	'case_temp' => $temperature2,
	'reader_temp' => $temperature3
);
echo json_encode($valori);
?>