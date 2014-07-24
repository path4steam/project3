<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'ecommerce_db';


$link = mysql_connect($host, $user, $pass, $db);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

?>
