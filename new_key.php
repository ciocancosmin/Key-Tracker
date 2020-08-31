<p style="font-size:24px;">Adaugare cheie:</p>
<p></p>
<div style="margin-top: 25px;display: block;z-index: -2;" id="add_user_div">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:140px;">Denumire cheie: </span>
              </div>
              <input type="text" class="form-control" onclick="open_keyboard('add_user_username')" id="add_user_username" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

			<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:140px;height:42px;">Stare: </span>
              </div>
 			<select class="form-control form-control-lg1" style="margin-bottom: 0px;" id="add_user_activity">
              <option default value="active">Activ</option>
              <option value="not_active">Inactiv</option>
            </select>
			</div>	

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-info" onclick="scan_card_key_add();" >Scaneaza card</button>
              </div>
              <input type="text" class="form-control form-control" id="add_user_card_series" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled>
            </div>

            <span id="add_user_error_message" style="font-size:20px;"></span>
            <span id="add_user_success_message" style="font-size:20px;"></span>
			<p></p>
			<div class="btn btn-success"  onclick="send_add_key();" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/save_key32.png" type="image/gif" style="font-size:24px;">&nbsp;Salvare
			</div>
			<div class="btn btn-success" onclick="show_keys();" id="admin_user_btn" style="width:120px;height:46px;">
			<img src="img/cancel32.png" type="image/gif" style="font-size:24px;">&nbsp;Anulare
			</div>	
</div>
<p></p>