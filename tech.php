<?php
$title='Tech';
include_once("header.php");
include_once("scripts/functii.php");
?>
    <div class="container-fluid column-fluid">

	
<div class="mask pattern-8 flex-center">
	
	
	<div  id="sys1">
	<?php require_once('scripts/system1.php');?>
	</div>
	<hr class="row0">
	<div class="row row1">
	<div class="Title"><img src="img/cpu.png" alt="CPU"> &nbsp;CPU</div>
	<div class="Text" id="sys2">
	<p></p>
	<table class="row6">
	<tr>
	<td style="width:120px;height:90px;" id="cpu_av1"></td>
	<td style="width:120px;height:90px;" id="cpu_av5"></td>
	<td style="width:120px;height:90px;" id="cpu_av15"></td>
	<script type="text/javascript">
		$(window).load(function() {
			var cpu_av1 = new JustGage({
				id: "cpu_av1", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "CPU 1min",
				label: "% loaded"
			});
			var cpu_av5 = new JustGage({
				id: "cpu_av5", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "CPU 5min",
				label: "% loaded"
			});
			var cpu_av15 = new JustGage({
				id: "cpu_av15", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "CPU 15min",
				label: "% loaded"
			});
			function getValori1() {
				$.ajax({
					url: "scripts/cpu.php",
					type: "GET",
					cache: false,
					async: true,
					dataType: "json",
					success: function(data) {
						cpu_av1.refresh(data.cpu_av1);
						cpu_av5.refresh(data.cpu_av5);
						cpu_av15.refresh(data.cpu_av15);
					}
				});
			}
			//setTimeout(getValori1, 10000);
			getValori1();
			setInterval(function(){
				  getValori1();
			}, 5000);
		});
    </script>
	</tr>
	</table>
	<p></p>
	<div id="sys3">
	<?php require_once('scripts/system2.php');?>
	</div>
	</div>
	</div>
	<hr class="row1">
	<div class="row row2">
	<div class="Title"><img src="img/cpu_temp.png" alt="Temperature"> &nbsp;Temperature</div>
	<div class="Text">
	<p></p>
	<table class="row6">
	<tr>
	<td style="width:120px;height:90px;" id="cpu_temp"></td>
	<td style="width:120px;height:90px;" id="case_temp"></td>
	<td style="width:120px;height:90px;" id="reader_temp"></td>
	<script type="text/javascript">
		$(window).load(function() {
			var cpu_temp = new JustGage({
				id: "cpu_temp", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "CPU temp",
				label: "C degree"
			});
			var case_temp = new JustGage({
				id: "case_temp", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "Case temp",
				label: "C degree"
			});
			var reader_temp = new JustGage({
				id: "reader_temp", 
				value: 0, 
				min: 0,
				max: 100,
				humanFriendly: true,
				title: "Reader temp",
				label: "C degree"
			});
			function getValori1() {
				$.ajax({
					url: "scripts/temperature.php",
					type: "GET",
					cache: false,
					async: true,
					dataType: "json",
					success: function(data) {
						cpu_temp.refresh(data.cpu_temp);
						case_temp.refresh(data.case_temp);
						reader_temp.refresh(data.reader_temp);
					}
				});
			}
			//setTimeout(getValori1, 10000);
			getValori1();
			setInterval(function(){
				  getValori1();
			}, 5000);
		});
    </script>
	</tr>
	</table>
	<p></p>
	</div>
	</div>
	<div  id="sys4">
	<?php require_once('scripts/memory.php');?>
	</div>
	<div id="sys5">
	<?php require_once('scripts/disk.php');?>
	</div>
	<p></p>
	<hr class="row5">
	<div id="sys8">
	<?php require_once('scripts/network.php');?>
	</div>
	<hr class="row6">
	<div  id="sys7">
	<?php require_once('scripts/services.php');?>
	</div>
	<hr>
	
	
</div>	
</div>
<p></p>
</div>
<?php include_once('footer.php'); ?>
