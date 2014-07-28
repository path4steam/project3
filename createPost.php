<?php

require_once("config.php");
session_start();

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) 
    or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link) 
    or die ("Error selecting the database: " . mysql_error());

$item_title = mysql_real_escape_string($_POST['item_title']);
$item_price = mysql_real_escape_string($_POST['item_price']);
$item_image = mysql_real_escape_string($_POST['image']);
$item_description = mysql_real_escape_string($_POST['item_description']);
$error_flag = false;

// Check for empty fields, image optional */
if ($item_title == '' || $item_price == '' || $item_description == ''){ 
    // No need for echos.
    // echo "Error: one or more form fields are empty!";
    $error_flag = true; 
    header("Location: newPost.php?error=fields_empty");
    die();
}

if ($error_flag == false) {
    // Insert new post into database */
    // >Insertion.gif
    // >hhnnnnggggg
    if ($item_image == ''){
        // if no image
        $query = sprintf("INSERT INTO inventory (user_id, item_title, item_price, item_description) 
            VALUES ('%s', '%s', '%s', '%s')", $_SESSION['user_id'], $item_title, $item_price, $item_description);
    }
    else{
        // if image
        $query = sprintf("INSERT INTO inventory (user_id, item_title, item_price, item_image, item_description) 
            VALUES ('%s', '%s', '%s', '%s', '%s')", $_SESSION['user_id'], $item_title, $item_price, $item_image, $item_description);
    }
    $result = mysql_query($query);
    if (!$result) {
        die("Error: ". mysql_error());
    }

    // Insertion successful */
    // echo "Insertion successful!";
    header("Location: menu.php?posted_new=true");
}

?>