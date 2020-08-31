<?php
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

$valori = array(
	'cpu_av1' => $l[0],
	'cpu_av5' => $l[1],
	'cpu_av15' => $l[2]
);
echo json_encode($valori);
?>
