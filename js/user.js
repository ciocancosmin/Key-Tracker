function show_change_pass()
{
	$('#main_col').html('');
    $.ajax({
        type: "GET",
        url: "./change_pass.php",
        success: function(data){
            
            $('#main_col').html(data);
            $("#change_pass_success_message").css('display','none');
            $("#change_pass_error_message").css('display','none');

        }

    });
}
function hide_change_pass()
{
	$("#change_pass_div").css('display','none');
	$("#change_pass_btn").attr('onclick','show_change_pass();');	
}
function send_change_password()
{
	curr_pass = $('#current_pass').val();
	new_pass = $('#new_pass').val();
	append = curr_pass + "///" + new_pass;
    if(curr_pass != "" && new_pass != "")
    {

        $.ajax({
        type: "POST",
        url: "./change_password.php",
        data:{send_data:append},
        success: function(data){
            
            if(data == "success")
            {
                $("#change_pass_error_message").css('display','none');
                $("#change_pass_success_message").html('Parola dvs. a fost schimbata cu success!');
                $("#change_pass_success_message").css('display','block');
            }
            else if(data == "0")
            {
                $("#change_pass_success_message").css('display','none');
                $("#change_pass_error_message").html('Eroare la conectarea la baza de date!');
                $("#change_pass_error_message").css('display','block');
            }
            else if(data == "1")
            {
                $("#change_pass_success_message").css('display','none');
                $("#change_pass_error_message").html('Parola actuala nu este corecta!');
                $("#change_pass_error_message").css('display','block');
            }

        }

    });

    }	
    else
    {
        $("#change_pass_success_message").css('display','none');
        $("#change_pass_error_message").html('Toate campurile sunt obligatorii!');
        $("#change_pass_error_message").css('display','block');
    }
}

function reset_all_things_user()
{
    $("#change_pass_div").css('display','none');
}
function show_info()
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
 