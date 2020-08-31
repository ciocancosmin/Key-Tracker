	<div class="row row6">
	<?php
	$info_net= net_info();
	?>
	<div class="Title"><img src="img/network.png" alt="Network"> &nbsp;Network</div>
	<div class="Text" id="Text6">
	<p>Interface: <b>eth0</b></p>
	<p>	MTU: <b><?php echo $info_net[0];?></b></p>
	<p>	TX OK: <b><?php echo $info_net[1];?><i class="icon-arrow-up"></i></b> RX OK: <b><?php echo $info_net[2];?><i class="icon-arrow-down"></i></b></p>
	<p>	Sent error: <b><?php echo $info_net[3];?><i class="icon-arrow-up"></i></b> Received error: <b><?php echo $info_net[4];?><i class="icon-arrow-down"></i></b></p>
	<p><b>IP Settings:</b></p>
	<table class="row6">
	<tr>
	<td style="width:80px;"> IP: </td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="ip1" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="ip2" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="ip3" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="254" aria-label="ip4" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td> NMask: </td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="255" aria-label="nmsk1" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="255" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="255" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="0" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td> GW: </td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="nmsk1" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="254" aria-label="nmsk" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td> DNS1: </td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="dns1_1" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="dns1_2" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="10" aria-label="dns1_3" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="1" aria-label="dns1_4" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td> DNS2: </td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="8" aria-label="dns2_1" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="8" aria-label="dns2_2" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="8" aria-label="dns2_3" aria-describedby="basic-addon1"></td>
	<td><input type="text" maxlength="3" size="3" class="form-control form-control-sm" placeholder="8" aria-label="dns2_4" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td> Hostname: </td>
	<td colspan="4"><input type="text" maxlength="50" size="3" class="form-control form-control-sm" placeholder="<?php hostname();?>" aria-label="host" aria-describedby="basic-addon1"></td>
	</tr>
	<tr>
	<td collspan=4></td>
	</tr>
	</table>
	<p></p>
	<p><button class="btn btn-outline-success btn-sm" style="align:center;">Salveaza</button>
	<button class="btn btn-outline-danger btn-sm" style="align:center;">Anuleaza</button>
	</p>
	</div>
	</div>