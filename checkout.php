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

        // $id = intval($_GET['id']);
        if(isset($_SESSION['cart'])){
            // $_SESSION['cart'][$id]['quantity']++;
            unset($_SESSION['cart']);
            
        }
    header("Location: menu.php?message=checkout_complete");
?>