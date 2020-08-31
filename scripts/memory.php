<?php
function human_filesize($bytes, $decimals = 2)
{
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
function mem_info()
{
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
	$info_memory= array($used_mem,$percent_used,$free_mem,$total_mem,$buffer_mem,$percent_buff,$cache_mem,$percent_cach,$used_swap,$percent_swap,$free_swap,$total_swap);
	return ($info_memory);
}
$info_memory= mem_info();
?>
	<hr class="row2">
	<div class="row row3">
	<div class="Title"><img src="img/memory.png" alt="Memory"> &nbsp;Memory</div>
	<div class="Text" id="Text3">
	<p><b>General: </b>Used: <b><?php echo $info_memory[0];?></b> (<b><?php echo $info_memory[1];?>%</b>) Available: <b><?php echo $info_memory[2];?></b> Total: <b><?php echo $info_memory[3];?></b></p>
	</div>
	<div class="Text" id="Text3">
	<div class="progress">
	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $info_memory[1];?>" style="width: <?php echo $info_memory[1];?>%;"><?php echo $info_memory[1];?>%</div>
	</div>
	<p></p>
	<p><b>Buffered: </b>Used: <b><?php echo $info_memory[4];?></b> (<b><?php echo $info_memory[5];?>%</b>)</p>
	</div>
	<div class="Text" id="Text3">
	<div class="progress">
	<div class="progress-bar progress-bar-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $info_memory[5];?>" style="width: <?php echo $info_memory[5];?>%;"><?php echo $info_memory[5];?>%</div>
	</div>
	<p></p>
	<p><b>Cached: </b>Used: <b><?php echo $info_memory[6];?></b> (<b><?php echo $info_memory[7];?>%</b>)
	</div>
	<div class="Text" id="Text3">
	<div class="progress">
	<div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $info_memory[7];?>" style="width: <?php echo $info_memory[7];?>%;"><?php echo $info_memory[7];?>%</div>
	</div>
	<p></p>
	</div>
	</div>
	<hr class="row3">
	<div class="row row4">
	<div class="Title"><img src="img/swap.png" alt="Swap"> &nbsp;Swap</div>
	<div class="Text" id="Text4"><p>Used: <b><?php echo $info_memory[8];?></b> (<b><?php echo $info_memory[9];?>%</b>) Free: <b><?php echo $info_memory[10];?></b> Total: <b><?php echo $info_memory[11];?></b></p><p></p>
	<div class="progress">
	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $info_memory[9];?>" style="width: <?php echo $info_memory[9];?>%;"><?php echo $info_memory[9];?>%</div>
	</div>
	<p></p>
	</div>
	</div>