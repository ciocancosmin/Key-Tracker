<style type="text/css">
#get_keys_succ{
	color: #00B530;
	font-size: 20px;
	display: block;	
}
#get_keys_err{
	color: red;
	font-size: 20px;
	display: block;
}
.card_div{
	display: block;
	padding: 10px;
	width: 100%;
	background-color: #F0F0F0;
	margin-bottom: 5px;
}
</style>
<p style="font-size:24px;">Primire chei:</p>
<script type="text/javascript">
	manage_levels("get");
</script>
<div>
	<div>
	<button class="btn btn-success" id="get_scan" style="margin-top: 20px;" onclick="send_scan(1);" >Scaneaza</button>
	<button class="btn btn-danger" id="get_cancel_0" style="margin-top: 20px;" onclick="location.reload();refresh_session();" >Anuleaza</button>
	</div>
	<div>
	<button class="btn btn-success" id="get_finnish" style="margin-top: 20px;" onclick="finish_receive_scan();" >Finalizeaza scanarea</button>
	<button class="btn btn-danger" id="get_delete" style="margin-top: 20px;" onclick="destroy_last_scan();" >Distruge ultima scanare</button>
	</div>
	<div>
	<button class="btn btn-info" id="get_print" style="margin-top: 20px;" onclick="print_scan();" >Printeaza scanarea</button>
	<button class="btn btn-danger" id="get_cancel_1"  style="margin-top: 20px;" onclick="location.reload();refresh_session();" >Anuleaza</button>
	</div>
	<p id="get_keys_err"></p>
	<p id="get_keys_succ"></p>
	<hr>
	<div class="scan">
		
	</div>
	<div id="total_keys_scanned" style="display: none;"></div>
</div>