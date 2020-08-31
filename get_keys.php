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
<p style="font-size:24px;">Predare chei:</p>
<script type="text/javascript">
	manage_levels("give");
</script>
<div>
	<div>
	<button class="btn btn-success" id="give_scan" style="margin-top: 20px;" onclick="send_scan(0);" >Scaneaza</button>
	<button class="btn btn-danger" style="margin-top: 20px;" id="give_cancel_0" onclick="location.reload();refresh_session();" >Anuleaza</button>
	</div>
	<div>
	<button class="btn btn-success" id="give_finnish" style="margin-top: 20px;" onclick="finish_scan();" >Finalizeaza</button>
	<button class="btn btn-danger" id="give_delete" style="margin-top: 20px;" onclick="destroy_last_scan();" >Distruge ultima scanare</button>
	</div>
	<div>
	<button class="btn btn-info" id="give_print"  style="margin-top: 20px;" onclick="print_scan();" >Printeaza scanarea</button>
	<button class="btn btn-danger" id="give_cancel_1"  style="margin-top: 20px;" onclick="location.reload();refresh_session();" >Anuleaza</button>
	</div>
	<p id="get_keys_err"></p>
	<p id="get_keys_succ"></p>
	<div class="scan">
	</div>
	<div id="total_keys_scanned" style="display: none;"></div>
</div>