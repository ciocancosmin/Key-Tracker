<?php
	if(isset($_POST['send_data']))
	{
	$data = explode("_", $_POST['send_data']);
	echo $data[0]."  ".$data[1];
		if ($data[0] == 'apache2')
		{
			shell_exec("sudo /bin/systemctl restart ".$data[0].".service");
		}
		else if ($data[0] == 'mariadb')
		{
			shell_exec("sudo /bin/systemctl restart ".$data[0].".service");
		}
		else
		{
		shell_exec("sudo /bin/systemctl ".$data[1]." ".$data[0].".service");
		}
//	echo $data[1]." ".$data[0];
	echo "1";
	}
	else
	{echo "0";}

?>