<?php

$user = 'root';
$password = 'dbpass';
$db = 'Ecommerce';
$host = 'localhost';


$con = mysqli_connect($host, $user, $password, $db) or die (mysqli_error($con));
// Check connection 


?>