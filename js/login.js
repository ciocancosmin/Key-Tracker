var input_choice = "";
var input_choice2 = "";
var focus = "password";
var cps = 0;
var keyboard_subtract = 0;
function open_keyboard(id)
{
	if(window.screen.width < 620)
	{
		$('#keyboard').css('display','block');
		if(id == 0)
		{
			input_choice = "username_inp";
			focus = "password";
		}
		else if(id == 1)
		{
			input_choice = "password_inp";
			focus = "click_login";
		}
	}
}
function enter_btn_login()
{
	if(focus == "username") 
	{
		$("#username_inp").focus();
		open_keyboard(0);
		focus = "password";	
	}
	else if(focus == "password")
	{
		$("#password_inp").focus();
		open_keyboard(1);
		focus = "click_login";
	}
	else if(focus == "click_login")
	{
		$("#login_btn").click();
	}
}
function click_keyboard(key)
{
	keycode = key.charCodeAt(0);
	if( (keycode >= 65 && keycode <= 90) || (keycode >= 97 && keycode <= 122) ) keycode -= keyboard_subtract;
	keycode = String.fromCharCode(keycode);
	inp_val = $('#'+input_choice).val();
	$('#'+input_choice).val(inp_val + keycode);
}
function delete_from_keyboard()
{
	inp_val = $('#'+input_choice).val();
	$('#'+input_choice).val( inp_val.substring(0,inp_val.length - 1) );
}
function caps_lock()
{
	if(cps == 0)
	{
		$("#keyboard").css('display','block');
		$("#keyboard2").css('display','none');
		keyboard_subtract = 32;
		for (var i = 1; i <= 27; i++) {
			t = $("#keyboard1-"+i).html();
			target_ascii_nr = t.charCodeAt(0) - 32;
			replace_char = String.fromCharCode(target_ascii_nr);
			$("#keyboard1-"+i).html(replace_char);
		}
		cps = 2;
	}
	else if(cps == 1)
	{
		keyboard_subtract = 0;
		for (var i = 1; i <= 27; i++) {
			t = $("#keyboard1-"+i).html();
			target_ascii_nr = t.charCodeAt(0) + 32;
			replace_char = String.fromCharCode(target_ascii_nr);
			$("#keyboard1-"+i).html(replace_char);
		}
		$("#keyboard").css('display','block');
		$("#keyboard2").css('display','none');
		cps = 0;
	}
	else if(cps == 2)
	{
		$("#keyboard").css('display','none');
		$("#keyboard2").css('display','block');
		cps = 1;
	}
}
function login()
{
	$('#keyboard').css('display','none');
	var send_data = $("#username_inp").val() + ";" + $("#password_inp").val();
	$.ajax({
        type: "POST",
        url: "./login.php",
        data: {post_data:send_data},
        beforeSend: function() {
        	$(".loader").css('display','block');
    	},
        success: function(data){
        	$(".loader").css('display','none');
        	$("#username_inp").val('');
			$("#password_inp").val('');
			if(data == "success")
			{
				$.ajax({
			        type: "POST",
			        url: "./register_last_login.php",
			        data: {send_data:"register"},
			        success: function(data){
			        	//alert(data);
			        }
			    });
				window.location.replace("index.php");
			}
			else
			{
				if(data == "0")
				{
					$("#login_div_error").html('Eroare baza de date!');
				}
				else if(data == "1")
				{
					$("#login_div_error").html('Date incorecte!');	
				}
				else if(data == "2")
				{
					$("#login_div_error").html('Card neinregistrat!');	
				}
				else if(data == "3")
				{
					$("#login_div_error").html('Contul inactiv!');	
				}
				else if(data == "4")
				{
					$("#login_div_error").html('Mai mult de 1 card!');	
				}
			}
			//alert(data);
        }

    });
}
