<?php
//Connection variable Credentials
$host = 'localhost';
$user = 'root';
$pass = '';
$dbase = 'runusa';

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
} catch(PDOException $e){
	die('Connection Failed: ' . $e->getMessage());
}

?>