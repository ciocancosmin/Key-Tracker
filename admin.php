<?php 
$title='Admin';
include_once("header.php");
?>
	<div class="row">
    <div class="col-md-12">
	<div class="btn btn-sm1 btn-outline-success" onclick="show_info_page();" id="admin_user_btn" style="width:180px;height:90px;">
	<img src="img/pie48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Info</p>
	</div>		
	<div class="btn btn-sm1 btn-outline-success" onclick="show_admin_users(0);" id="admin_user_btn" style="width:180px;height:90px;">
	<img src="img/user48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Utilizatori</p>
	</div>		
	<div class="btn btn-sm1 btn-outline-success" onclick="show_keys();" id="admin_user_btn" style="width:180px;height:90px;">
	<img src="img/key48.png" type="image/gif" size="48x48">
 	<p style="font-size:24px;">Chei</p>
	</div>		
    </div>
    </div>
		<p></p>
		<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" id="main_col" style="z-index: 2;">
          <?php include_once("info.php"); ?>
          <div id="admin_users_div">

          </div>
          </div>
          <div class="col-md-4"></div>

        </div>

        <?php include_once("keyboard.php"); ?>

    </div>
    </div>
  </div>
<?php include_once('footer.php'); ?>
