<p style="font-size:24px;">Modificare parola:</p>
<p></p>
<div style="margin-top: 25px;display: block;" id="change_pass_div">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Parola curenta</span>
              </div>
              <input type="password" class="form-control" id="current_pass" onclick="open_keyboard('current_pass')" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px;">Parola noua</span>
              </div>
              <input type="password" class="form-control" id="new_pass" aria-label="Default" onclick="open_keyboard('new_pass')" aria-describedby="inputGroup-sizing-default">
            </div>
			<p></p>
            <span id="change_pass_error_message"></span>
            <span id="change_pass_success_message"></span>
            <button class="btn btn-info" onclick="send_change_password();" >Trimite</button>
            <button class="btn btn-danger" onclick="location.reload();" >Anulare</button>
</div>
<p></p>
