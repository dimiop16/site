<?php
session_start();
global $pdo;
try{
	$pdo = new PDO("mysql:dbname=classificados;host=localhost","root","1234");
}catch(PDOException $e){
	echo "Houve Erro: ".$e->getMessage();
	exit;
}


?>
