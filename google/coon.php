<?php 

@session_start();
@ob_start();
$servers = "localhost";
$user = "root"; 
$pass = "";
$data = "google";

$conn = new PDO("mysql:host=$servers;dbname=$data", $user, $pass);

?>