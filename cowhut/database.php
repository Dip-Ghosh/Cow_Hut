<?php 
	function connect()
	{
		$host = 'localhost';
		$user = 'root';
		$password = "";
		$database = "project";

		$db = mysqli_connect($host, $user, $password, $database);


		if($db){
			//echo "<br>Successfully connected<br>";
		}else{
			die("<br>Error" . mysqli_connect_error());
		}

		return $db;
	}

	connect();
 ?>