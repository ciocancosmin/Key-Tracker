function ch_switch() {
	if (document.getElementById("ssh_services").src == "img/play.png") 
    {
    document.getElementById("ssh_services").src = "img/stop.png";
    alert("Hello! I am an alert box STOP!!");
	}
    else 
    {
	alert("Hello! I am an alert box START!!");
    document.getElementById("ssh_services").src = "img/play.png";
    }
	$("#services").load(" #services > *");
}

function ch_service(servicii,stare) {
window.confirm("Do you want "+stare+" service "+servicii+"?");
	if (confirm("Confirm "+servicii+" "+stare+"?"))
	{
//	alert("Service "+servicii+" modified.");
    $.ajax({
        type: "POST",
        url: "../scripts/ch_services.php",
        data:{send_data:servicii+"_"+stare},
        success: function(data){
		$("#sys7").load(window.location.href + " #sys7" );
//		alert("Service "+servicii+" modified.");
//			alert(data);
			if(data == "1")
            {
//			alert("Service "+servicii+" modified.");
//		$(document).ready(function(){$("#sys7").load(window.location.href + " #sys7" );});
			}
			else
			{
//			alert("Error to modify "+servicii+" service.");
            }

        }

    });
	} else {
//	alert("Cancel service "+servicii+" modified.");
	}
}

function reboot() {

    $.ajax({
        type: "POST",
        url: "../scripts/reboot_now.php",
		data:{send_data:"reboot_now"},
		success: function(data){
		if(data == "1")
        {
		alert("Reboot!!!");
		}
		else
		{
		alert("Error to reboot.");
        }
		}
    });
}

function cancel_reboot() {
alert("Cancel");
}


$(document).ready(function(){
setInterval(function(){
      $("#sys1").load(window.location.href + " #sys1" );
}, 1000);

setInterval(function(){
      $("#sys3").load(window.location.href + " #sys3" );
}, 5000);

setInterval(function(){
      $("#sys4").load(window.location.href + " #sys4" );
}, 5000);

setInterval(function(){
      $("#sys5").load(window.location.href + " #sys5" );
}, 15000);

/*setInterval(function(){
      $("#sys7").load(window.location.href + " #sys7" );
}, 5000);*/

});

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
