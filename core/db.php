<?php 
require_once 'config.php';

$connection = new mysqli($host, $user, $pass, $db);
if ($connection ->connect_error) die("Error connection");
?>