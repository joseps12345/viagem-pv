 <?php
/*	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db	= 'viagem';
	
	$conn = @mysql_connect($host,$user,$pass);
	if (!$conn) {
		die('Nao foi possivel Conectar: ' . mysql_error());
	}
	mysql_select_db($db, $conn);
	*/
	

?> 

<?php

	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "";
	$DB_name = "viagem";
	
	
	try
	{
		$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	 	echo $e->getMessage();
	}
	
	include_once 'crud.php';
	
	$crud = new crud($DB_con);

?>