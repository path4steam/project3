<?php

require_once("config.php");

session_start();
if(!$_SESSION['logged']){
    header("Location: index.php");
    die;
}

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) 
or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link) 
or die ("Error selecting the database: " . mysql_error());


  // if(isset($_SESSION['cart']['id'])){
  //       }
  //       else {
  //           $_SESSION['cart']['id']=array(
  //                   "quantity" => 0,
  //                   "price" => 0
  //               );
  //       }
include("header.php");
?>




<?php
include("footer.html");
?>