<p style="font-size:24px;">Adaugare utilizator:</p>
<p></p>
<div style="margin-top: 25px;display: block;z-index: -2;" id="add_user_div">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Utilizator: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_username')" id="add_user_username" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Nume: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_firstname')" id="add_user_firstname" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Prenume: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_lastname')" id="add_user_lastname" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Parola: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_password')" id="add_user_password" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Legitimatie: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_legitimation_id')" id="add_user_legitimation_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

			<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;height:42px;">Nivel: </span>
              </div>
 			<select class="form-control form-control-lg1 " style="margin-bottom: 0px;" id="add_user_type">
              <option default value="normal_user">User</option>
              <option value="admin_lv_2">Gestionar</option>
              <option value="admin_lv_3">Administrator</option>
            </select>
			</div>

			<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;height:42px;">Stare: </span>
              </div>
 			<select class="form-control form-control-lg1" style="margin-bottom: 0px;" id="add_user_activity">
              <option default value="active">Activ</option>
              <option value="not_active">Inactiv</option>
            </select>
			</div>	

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-info" onclick="scan_card_user_add();" >Scaneaza card</button>
              </div>
              <input type="text" class="form-control form-control" id="add_user_card_series" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled>
            </div>

            <span id="add_user_error_message" style="font-size:20px;"></span>
            <span id="add_user_success_message" style="font-size:20px;"></span>
			<p></p>
			<div class="btn btn-success" onclick="send_add_user();" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/save32.png" type="image/gif" style="font-size:24px;">&nbsp;Salvare
			</div>
			<div class="btn btn-success" onclick="show_admin_users(0);" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/cancel32.png" type="image/gif" style="font-size:24px;">&nbsp;Anulare
			</div>				
</div>
<p></p>