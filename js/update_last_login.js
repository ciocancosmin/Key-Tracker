function update_last_login()
{
		$.ajax({
	        type: "POST",
	        url: "./get_last_login.php",
	        data: {send_data:"get_data"},
	        success: function(data){
	        	splt = data.split("////");
	        	$("#last_login_date").html($("#last_login_date").html() + splt[0]);
	        	$("#last_login_hour").html($("#last_login_hour").html() + splt[1]);
	        	$("#last_login_ip").html($("#last_login_ip").html() + splt[2]);
	        }
	    });
}
$( document ).ready(function() {
  update_last_login();
});
