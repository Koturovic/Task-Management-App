<?php  

$sName = "localhost";
$uName = "root";
$pass  = "Ubuntuvm2025@";
$db_name = "task_management_db";

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	echo "Connection failed: ". $e->getMessage();
	exit;
}