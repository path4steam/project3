<?php
include('connect.php');
session_start();
date_default_timezone_set("America/New_York");
$content="";
$footer="";
//check for cookie
if(isset($_COOKIE['username'])){
  $_SESSION['username']=$_COOKIE['username'];
}

//test the password
if(!empty($_POST['username;])){
//test login against database
  mysql_select_db("ecommerce_db");
  $username = $_POST['username'];
  $password = $_POST['pass'];
  
