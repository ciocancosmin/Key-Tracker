<?php

  include_once("config.php");

  if(isset($_GET['k']))
  {

      $err = "";
      $err2 = 0;

      $key_name = "";
      $key_card = "";
      $key_state = "";

      $target_key_id = $_GET['k'];
      $qry = mysqli_query($link,"SELECT * FROM keys_table WHERE id='".$target_key_id."'");
      if(mysqli_num_rows($qry) > 0)
      {

        $qry = mysqli_fetch_array($qry);
        $key_name = $qry['key_name'];
        $key_card = $qry['key_card'];
        $key_state = $qry['key_state'];

      }
      else
      {
        $err = "Nu se poate conecta la baza de date! ";
        $err2 = 1;
      }

  }


?>
<p style="font-size:24px;">Modificare cheie:</p>
<p></p>
<div style="margin-top: 25px;display: block;z-index: -2;" id="add_user_div">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:140px;">Denumire cheie: </span>
              </div>
              <input type="text" class="form-control" value="<?php
                if($err2 == 0) echo $key_name;       
               ?>" onclick="open_keyboard('add_user_username')" id="add_user_username" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

			<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:140px;height:42px;">Stare: </span>
              </div>
 			<select class="form-control form-control-lg1" style="margin-bottom: 0px;" id="add_user_activity">
              <option <?php 
                if($err2 == 0)
                  if($key_state == 1) echo "selected='selected'";
              ?> default value="active">Activ</option>
              <option <?php 
                if($err2 == 0)
                  if($key_state == 0) echo "selected='selected'";
              ?> value="not_active">Inactiv</option>
            </select>
			</div>	

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-info" onclick="scan_card_key_add();" >Scaneaza card</button>
              </div>
              <input type="text" value="<?php
                if($err2 == 0) echo $key_card;       
               ?>" class="form-control form-control" id="add_user_card_series" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled>
            </div>

            <span id="add_user_error_message"></span>
            <span id="add_user_success_message"></span>
			<p></p>
			<div class="btn btn-success"  onclick="send_edit_key(<?php echo $target_key_id; ?>);" id="key_user_btn" style="width:120px;height:46px;">
			<img src="img/save_key32.png" type="image/gif" style="font-size:24px;">&nbsp;Salvare
			</div>
			<div class="btn btn-success" onclick="show_keys();" id="key_user_btn" style="width:120px;height:46px;">
			<img src="img/cancel32.png" type="image/gif" style="font-size:24px;">&nbsp;Anulare
			</div>
</div>
<p></p>