var users = "";
var load_users_start = 0;
var load_users_finish = 10;
var load_users_scroll_size = 10;

function show_info_page()
{
    $("#main_col").html('');
    $.ajax({
    type: "GET",
    url: "./info.php",
    success: function(data){

        $("#main_col").html(data);
    
    }

    });   
}
function show_add_user()
{
    $("#main_col").html('');
    $.ajax({
    type: "GET",
    url: "./new_user.php",
    success: function(data){

        $("#main_col").html(data);
        $("#add_user_error_message").html('');
        $("#add_user_success_message").html('');
    }

    });
}
function hide_add_user()
{
	$("#add_user_error_message").html('');
	$("#add_user_success_message").html('');
	$("#add_user_div").css('display','none');
	$("#add_user_btn").attr('onclick','show_add_user();');
}
function send_add_user()
{
    $("#add_user_error_message").html('');
    $("#add_user_success_message").html('');
	var append = $("#add_user_username").val() + "////" + $("#add_user_password").val() + "////" + $("#add_user_firstname").val() + "////" + $("#add_user_lastname").val() + "////" + $("#add_user_legitimation_id").val() + "////" + $("#add_user_card_series").val() + "////" + $("#add_user_type").val() + "////" + $("#add_user_activity").val();
	var card_ok = 1;
    if( $("#add_user_type").val() == "normal_user" && $("#add_user_card_series").val() == "" ) card_ok = 0;
    if( $("#add_user_username").val() != "" && $("#add_user_password").val() != "" && $("#add_user_firstname").val() != "" && $("#add_user_lastname").val() != "" &&  $("#add_user_legitimation_id").val() != "" && card_ok == 1 && $("#add_user_type").val() != "not_defined" )
    {

        $.ajax({
        type: "POST",
        url: "./add_user.php",
        data:{send_data:append},
        success: function(data){
            if(data == "success")
            {
                $("#add_user_username").val('');
                $("#add_user_password").val('');
                $("#add_user_firstname").val('');
                $("#add_user_lastname").val('');
                $("#add_user_legitimation_id").val('');
                $("#add_user_card_series").val('');
                $("#add_user_error_message").html('');
                $("#add_user_success_message").html('Utilizatorul a fost adaugat.');
            }
            else if(data == "0")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Eroare baza de date!');
            }
            else if(data == "1")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Numele utilizator existent!');
            }

        }

    });

    }  
    else
    {
        if(card_ok == 0)
        {
            $("#add_user_success_message").html('');
            $("#add_user_error_message").html('Pentru nivel normal scanati card!');    
        }
        else if( $("#add_user_type").val() == "not_defined")
        {
            $("#add_user_success_message").html('');
            $("#add_user_error_message").html('Tip utilizator nedefinit!');   
        }
        else
        {
            $("#add_user_success_message").html('');
            $("#add_user_error_message").html('Toate campurile sunt obligatorii!');
        }
    } 
}
function scan_card_user_add()
{
    $("#add_user_card_series").val('');
    $("#add_user_error_message").html('');
    $.ajax({
        type: "POST",
        url: "./scan_cards.php",
        data:{send_data:"read_cards"},
        success: function(data){
            if(data == "0")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Eroare cititor carduri!');
            }
            else if(data == "2")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Ati citit mai mult de 1 card!');
            }
            else if(data == "1")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Card inregistrat!'); 
            }
            else if(data == "3")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Nu ati citit nici un card!');
            }
            else
            {
                $("#add_user_card_series").val(data);
            }

        }

    });

}
function scan_card_key_add()
{
    $("#add_user_card_series").val('');
    $("#add_user_error_message").html('');
    $.ajax({
        type: "POST",
        url: "./scan_cards.php",
        data:{send_data:"read_cards"},
        success: function(data){
            //$("#add_user_card_series").val('');
            //alert(data);

            if(data == "0")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Eroare cititor carduri!');
            }
            else if(data == "2")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Ati citit mai mult de 1 card!');
            }
            else if(data == "1")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Cheie inregistrata cu acest card!'); 
            }
            else if(data == "3")
            {
                $("#add_user_success_message").html('');
                $("#add_user_error_message").html('Nu ati citit nici un card!');
            }
            else
            {
                $("#add_user_card_series").val(data);
            }

        }

    });

}

function show_admin_users(opt)
{
    $("#main_col").html('');
    /*load_users(load_users_start,load_users_finish);
    $("#admin_users_div").css('display','block');
    $("#admin_user_btn").attr('onclick','show_admin_users(1);');*/
    $.ajax({
    type: "GET",
    url: "./show_users.php",
    success: function(data){

        $("#main_col").html(data);

    }

});

}
function load_users(start,finish)
{
    $.ajax({
        type: "POST",
        url: "./get_users.php",
        data:{send_data:"get_users",start:start,finish:finish},
        success: function(data){

            x = data.split("////");
            for (var i = 0; i < x.length - 1; i++) {
                y = x[i].split(";");
                $("#admin_users_div").html( $("#admin_users_div").html() + '<div class="small_user_div" id="admin_users_div_'+i+'"><p class="small_user_div_p">Utilizator: '+y[0]+'</p><hr><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Nume:</span></div><input type="text" class="form-control" id="admin_users_div_name_inp_'+i+'" value="'+y[1]+'" aria-label="Default" aria-describedby="inputGroup-sizing-default"></div><hr><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Prenume:</span></div><input type="text" class="form-control" id="admin_users_div_surname_inp_'+i+'" value="'+y[2]+'" aria-label="Default" aria-describedby="inputGroup-sizing-default"></div><hr><input type="password" name="" id="admin_users_pass_'+i+'"  placeholder="Seteaza noua parola" class="small_user_div_input"><hr><p class="small_user_div_p" id="admin_users_card_'+i+'">Card: '+y[3]+'</p><hr><div class="small_user_div_err" id="admin_users_err_'+i+'"></div><div class="small_user_div_succ" id="admin_users_succ_'+i+'"></div><hr><div class="small_user_div_buttons"><button class="btn btn-danger" style="margin-left:5px;" onclick="scan_card('+i+')">Scaneaza card</button><button class="btn btn-success" style="margin-left:5px;" onclick=save_settings("'+y[0]+'",'+i+') >Salveaza setarile</button><button class="btn btn-info" style="margin-left:5px;" onclick=invalidate_user("'+y[0]+'",'+i+')>Invalideaza user</button></div></div>' );
            }

        }

    });

    load_users_start += load_users_scroll_size;
    load_users_finish += load_users_scroll_size;

}
function load_user(id)
{
    $("#main_col").html('');
    $.ajax({
        type: "GET",
        url: "./edit_user.php?u="+id,
        success: function(data){

            $("#main_col").html(data);

        }

    });    
}
function save_settings()
{
    $("#add_user_error_message").html('');
    $("#add_user_success_message").html('');
    var user = $("#add_user_username").val();
    var tmp_firstname = $("#add_user_firstname").val();
    var tmp_lastname = $("#add_user_lastname").val();
    var tmp_pass = $("#add_user_password").val();
    var tmp_card = $("#add_user_card_series").val();
    var tmp_legitimation_id = $("#add_user_legitimation_id").val();
    var tmp_level = $("#add_user_type").val();
    var tmp_active = $("#add_user_activity").val();

    //alert(user + " " + tmp_firstname + " " + tmp_lastname + " " +tmp_pass + " " + tmp_card + " " + tmp_legitimation_id + " " + tmp_level + " " + tmp_active);    

    $.ajax({
        type: "POST",
        url: "./update_settings.php",
        data:{user:user,active:tmp_active,legitimation_id:tmp_legitimation_id,level:tmp_level,password:tmp_pass,card:tmp_card,send_data:"update_settings",firstname:tmp_firstname,lastname:tmp_lastname},
        success: function(data){

            //alert(data);

            if(data == "0")
            {
                $("#add_user_error_message").html('Eroare baza de date!');
            }
            else
            {
                $("#add_user_success_message").html('Datele actualizate cu succes!');  
            }

        }

    });
}
function scan_card(div_nr)
{
    $("#admin_users_err_"+div_nr).html('');
    $.ajax({
        type: "POST",
        url: "./scan_cards.php",
        data:{send_data:"read_cards"},
        success: function(data){

            if(data == "1")
            {
                $("#admin_users_err_"+div_nr).html('Cardul deja inregistrat!');
            }
            else if(data == "2")
            {
                $("#admin_users_err_"+div_nr).html('Ati citit mai mult de 1 card!');
            }
            else
            {
                $("#admin_users_card_"+div_nr).html('Card: '+data);
            }

        }

    });
}
function invalidate_user(user,div_nr)
{
    $.ajax({
        type: "POST",
        url: "./update_settings.php",
        data:{user:user,send_data:"invalidate_user"},
        success: function(data){

            //alert(data);

            if(data == "0")
            {
                $("#admin_users_err_"+div_nr).html('Eroare la conectarea la baza de date!');
            }
            else
            {
                $("#admin_users_div_"+div_nr).css('display','none');
            }

        }

    });
}
function reset_all_things()
{
    $("#change_pass_div").css('display','none');
    $("#add_user_div").css('display','none');
    $("#admin_users_div").css('display','none');
    load_users_start = 0;
    load_users_finish = load_users_scroll_size;
}
function show_keys()
{
    $("#main_col").html('');
    $.ajax({
        type: "GET",
        url: "./keys.php",
        success: function(data){

            $("#main_col").html(data);

        }

    });   
}
function show_add_key()
{
    $("#main_col").html('');
    $.ajax({
        type: "GET",
        url: "./new_key.php",
        success: function(data){

            $("#main_col").html(data);

        }

    }); 
}
function send_add_key()
{
    $("#add_user_error_message").html('');
    $("#add_user_success_message").html('');
    var key_name = $('#add_user_username').val();
    var key_active = $('#add_user_activity').val();
    var key_card = $('#add_user_card_series').val();
    if(key_name == "")
    {
        $("#add_user_error_message").html('Denumire cheie lipsa!');
    }
    else if(key_card == "")
    {
        $("#add_user_error_message").html('Necesar un card valid!');
    }
    else
    {
        //$("#add_user_card_series").val('');
        $.ajax({
        type: "POST",
        url: "./add_key.php",
        data:{key_name:key_name,key_card:key_card,key_active:key_active,command:"add_new_key"},
        success: function(data){

            if(data == "0")
            {
                $("#add_user_error_message").html('Eroare baza de date!');
            }
            else if(data == "1")
            {
                $("#add_user_error_message").html('Exista deja o cheie cu acest nume!');
            }
            else
            {
                $("#add_user_success_message").html('Cheia a fost adaugata in baza de date!');
                $("#add_user_card_series").val('');
                $("#add_user_username").val('');
            }

        }

    });

    }
}
function edit_key(key_id)
{
    $("#main_col").html('');
    $.ajax({
        type: "GET",
        url: "./edit_key.php?k="+key_id,
        success: function(data){

            $("#main_col").html(data);

        }

    });
}
function send_edit_key(key_id)
{
    $("#add_user_error_message").html('');
    $("#add_user_success_message").html('');
    var key_name = $('#add_user_username').val();
    var key_active = $('#add_user_activity').val();
    var key_card = $('#add_user_card_series').val();
    if(key_name == "")
    {
        $("#add_user_error_message").html('Adaugati denumire cheie!');
    }
    else if(key_card == "")
    {
        $("#add_user_error_message").html('Necesar card valid!');
    }
    else
    {
        //$("#add_user_card_series").val('');
        $.ajax({
        type: "POST",
        url: "./update_key.php",
        data:{key_id:key_id,key_name:key_name,key_card:key_card,key_active:key_active,command:"update_key"},
        success: function(data){

            if(data == "0")
            {
                $("#add_user_error_message").html('Eroare baza de date!');
            }
            else if(data == "1")
            {
                $("#add_user_error_message").html('Denumire cheie existenta!');
            }
            else
            {
                $("#add_user_success_message").html('Cheia a fost modificata.');
                //$("#add_user_card_series").val('');
                //$("#add_user_username").val('');
            }

        }

    });

    }
}
function update_with_user_name()
{
	$.ajax({
        type: "GET",
        url: "./get_user.php",
        success: function(data){
        	
        	$('#user_welcome_message').html("Utilizator: "+data);

        }

    });
}
update_with_user_name();  
