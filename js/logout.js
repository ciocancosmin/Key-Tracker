function logout()
{
	$.ajax({
        type: "GET",
        url: "./logout.php",
        success: function(data){
        	
        	window.location.replace("index.php");
        	//if(data == "1") window.location.replace("index.php");

        }

    });
}