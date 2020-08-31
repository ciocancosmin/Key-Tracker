<?php
	if(isset($_POST['send_data']))
	{
		if ($_POST['send_data']=='reboot_now')
		{	
			echo "1";
			sleep(3);
			shell_exec("sudo /sbin/reboot");
		}
		else
		{
			echo "0";
		}

	}
	else
	{echo "0";}
?>