<?php

$host = "localhost";
$port = "8889";
$dbname = "ideario";
$user = "gsantos";
$pass = "102938";

function getConnection() {
	global $host, $port, $user, $pass, $dbname;
	if (!($link = mysqli_connect($host.":".$port, $user, $pass)))  {
		echo "Error conectando a la base de datos.<br>"; 
		exit(); 
	} else {
		echo "";
	}
	if (!mysqli_select_db($link, $dbname)) 
	{ 
		echo "Error seleccionando la base de datos.<br>"; 
		exit(); 
	} else {
		echo "";//base de datos bien
	}
	return $link; 
}