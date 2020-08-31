function get_correct_redirect_location(level)
{
    if(level == "0" || level == "n0n3") return "index.php";
    else if(level == "1") return "user.php";
    else if(level == "2") return "gest.php";
    else if(level == "3") return "admin.php";
    else if(level == "4") return "tech.php";
}

function redirect_log_in()
{
	$.ajax({
        type: "GET",
        url: "./get_user_level.php",
        success: function(data){

        	x = window.location.href.split("/");
        	x = x[x.length-1];
            x = x.split("?")[0];
        	
            if(x == "tech.php" && data != "4") window.location.replace(get_correct_redirect_location(data));
            else if(x == "admin.php" && data != "3") window.location.replace(get_correct_redirect_location(data));   
        	else if(x == "gest.php" && data != "2") window.location.replace(get_correct_redirect_location(data));
            else if(x == "user.php" && data != "1") window.location.replace(get_correct_redirect_location(data));
            else if((x == "index.php" || x == "") && (data != "0" && data != "n0n3")) window.location.replace(get_correct_redirect_location(data));

            if(x == "edit_user.php" && data != "3") window.location.replace(get_correct_redirect_location(data));

        	/*else if(data == "3" && x != "big_admin.html")
        	{
        		window.location.replace("small_admin.html");
        	}*/
        }
    });
}
redirect_log_in();