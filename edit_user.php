<?php 

  include_once("config.php");

  $err = "";
  $err2 = 0;

  if(isset($_GET['u']))
  {
      $target_id = $_GET['u'];
      $qry = mysqli_query($link,"SELECT username,firstname,lastname,card,legitimation_id,activ,level FROM users WHERE id='".$target_id."' ") or die("Eroare la conectarea la baza de date");
      if(mysqli_num_rows($qry) > 0)
      {
        $row = mysqli_fetch_array($qry);
      }
      else
      {
        $err = "Utilizatorul cu id-ul precizat nu a fost gasit in baza de date";
        $err2 = 1;
      }
  }


?>
<p style="font-size:24px;">Modificare utilizator:</p>
<p></p>
<div style="margin-top: 25px;display: block;z-index: -2;" id="add_user_div">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Utilizator: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_username')" disabled value="<?php if($err2 == 0) echo $row['username']; ?>" id="add_user_username" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Nume: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_firstname')" id="add_user_firstname" value="<?php if($err2 == 0) echo $row['firstname']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Prenume: </span>
              </div>
              <input type="text" class="form-control" id="add_user_lastname" onclick="open_keyboard('add_user_lastname')" value="<?php if($err2 == 0) echo $row['lastname']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Parola: </span>
              </div>
              <input type="text" class="form-control" id="add_user_password" onclick="open_keyboard('add_user_password')" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Legitimatie: </span>
              </div>
              <input type="text" class="form-control" id="add_user_legitimation_id" onclick="open_keyboard('add_user_legitimation_id')" value="<?php if($err2 == 0) echo $row['legitimation_id']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

      <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;height:42px;">Nivel: </span>
              </div>
      <select class="form-control form-control-lg1 " style="margin-bottom: 0px;" id="add_user_type">
              <option <?php 
                  if($err2 == 0)
                    if($row['level'] == "1") echo 'selected="selected"';
                ?> value="normal_user">User</option>
              <option <?php 
                  if($err2 == 0)
                    if($row['level'] == "2") echo 'selected="selected"';
                ?> value="admin_lv_2">Gestionar</option>
              <option <?php 
                  if($err2 == 0)
                    if($row['level'] == "3") echo 'selected="selected"';
                ?> value="admin_lv_3">Administrator</option>
            </select>
      </div>

      <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;height:42px;">Stare: </span>
              </div>
      <select class="form-control form-control-lg1" style="margin-bottom: 0px;" id="add_user_activity">
              <option <?php 
                  if($err2 == 0)
                    if($row['activ'] == "1") echo 'selected="selected"';
                ?> value="active">Activ</option>
              <option 
              <?php 
                  if($err2 == 0)
                    if($row['activ'] == "0") echo 'selected="selected"';
                ?> value="not_active">Inactiv</option>
            </select>
      </div>  

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-info" onclick="scan_card_user_add();" >Scaneaza card</button>
              </div>
              <input type="text" class="form-control form-control" id="add_user_card_series" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled <?php 
                if($err2 == 0)
                    echo "value='".$row['card']."'";
              ?> >
            </div>

            <span id="add_user_error_message"></span>
            <span id="add_user_success_message"></span>
			<p></p>
			
			<div class="btn btn-success" onclick="save_settings();" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/save32.png" type="image/gif" style="font-size:24px;">&nbsp;Salvare
			</div>
			<div class="btn btn-success" onclick="show_admin_users(0);" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/cancel32.png" type="image/gif" style="font-size:24px;">&nbsp;Anulare
			</div>	

</div>
<p></p>