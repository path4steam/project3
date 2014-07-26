<?php

require_once("config.php");

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) 
	or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link) 
	or die ("Error selecting the database: " . mysql_error());

// Get login info */
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$error_flag = false;
// I suppose error flags are not really needed. May remove later.

// Check for empty fields */
if ($username == '' || $password == ''){
	$error_flag = true; 
	header("Location: index.php?error=fields_empty");
}

// Verify password */
$query_for_password = "SELECT password_hash FROM users WHERE user_name = '$username';";
$password_result = mysql_query($query_for_password);
$password_row = mysql_fetch_array($password_result);
$actual_hash = $password_row['password_hash'];
if (crypt($password, $actual_hash) == $actual_hash){

	// Give that database a little query query. */
	$query = "SELECT * FROM users WHERE user_name = '$username';";
	$result = mysql_query($query);

	// Everything checks out, start the session. */
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_array($result);
		session_start();
		$_SESSION['username'] = $row['user_name'];
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['logged'] = TRUE;
		header("Location: menu.php");
		// exit;
	}
}
else {
	header("Location: index.php?error=auth_failed");
	// exit;
}

?>