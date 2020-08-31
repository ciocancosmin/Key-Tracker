<?php
$title='HighUser';
include_once("header.php");
?>
<div class="row">
    <div class="col-md-12">
	<div class="row">
    <div class="col-md-12">
	<div class="btn btn-sm1 btn-outline-info" onclick="show_info_page();refresh_scan_levels();" style="width:180px;height:90px;">
	<img src="img/pie48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Info</p>
	</div>
	<div class="btn btn-sm1 btn-outline-success" onclick="show_receive_keys();refresh_scan_levels();" style="width:180px;height:90px;">
	<img src="img/key_in48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Primire Chei</p>
	</div>
	<div class="btn btn-sm1 btn-outline-danger" onclick="show_get_keys();refresh_scan_levels();" style="width:180px;height:90px;">
	<img src="img/key_out48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Predare Chei</p>
	</div>		
    </div>
	</div>
	<p></p>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" id="main_col" style="z-index: 2;">
    <?php include_once("info.php"); ?>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
</div>
</div>
</div>
<?php include_once('footer.php'); ?>
