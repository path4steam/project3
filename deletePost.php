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


    // if(isset($_GET['action']) && $_GET['action']=="add"){
        $id = intval($_GET['id']);
        // if(isset($_SESSION['cart'][$id])){
        //     $_SESSION['cart'][$id]['quantity']++;
        // }
        // else {
            $query = "DELETE FROM inventory WHERE item_id=$id";
            $result = mysql_query($query) or die(mysql_error());
            header("Location: menu.php?message=post_deleted");
            // }
        // }
    // }
    // header("Location: menu.php?message=added_to_cart");
?>