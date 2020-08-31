var input_choice = "";
var input_choice2 = "";
//var focus = "password";
var cps = 0;
var keyboard_subtract = 0;
function open_keyboard(id)
{
	if(window.screen.width < 620)
	{
		$('#keyboard').css('display','block');
		input_choice = id;
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
function close_keyboard()
{
	$("#keyboard").css('display','none');
	$("#keyboard2").css('display','none');
}