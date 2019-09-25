<?php 

	$db = new mysqli('localhost','root','','itms_capacitacion');

	$db -> set_charset("utf8");

	if($db->connect_error){
		    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
	}

?>