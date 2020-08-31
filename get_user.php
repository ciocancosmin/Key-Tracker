<?php

	session_start();

	if(isset($_SESSION['logged_in'])) echo $_SESSION['logged_in'];
	else echo "0";


?>