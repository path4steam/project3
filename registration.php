<?php

require_once("config.php");

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link);

if (!$db_selected) {
	die ("Error selecting the database: " . mysql_error());
}

/* Get the variables from the registration form */
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$confirm_password = mysql_real_escape_string($_POST['confirm_password']);
$error_flag = false;

// Check for empty fields */
if ($firstname == '' || $lastname == '' || $username == '' || $password == '' || $confirm_password == '' || $email == '') {
	// No need for echos.
	// echo "Error: one or more form fields are empty!";
	$error_flag = true; 
	header("Location: register.php?error=fields_empty");
	die();
}

// Check that passwords match */
if ($password != $confirm_password) {
	// echo "Error: Passwords do not match!";
	$error_flag = true;
	header("Location: register.php?error=unmatching_passwords");
	die();
}

// Check that username is not already taken.
if ($error_flag == false) {
	// LIMIT 1: stop searching if you find a match */
	$query = "SELECT user_name FROM users WHERE user_name = '$username' LIMIT 1;";
	$result = mysql_query($query);

	// The username already exists  */
	if (mysql_num_rows($result) != 0) { 
		// echo "Username already taken, pick another.";
		$error_flag = true;
		header("Location: register.php?error=username_taken");
		die();
	}
}

if ($error_flag == false) {
	// Insert user data into database */
	// Hash password
	$password_hash = crypt($password);
	// >Insertion.gif
	// >hhnnnnggggg
	$query = sprintf("INSERT INTO users (firstname, lastname, user_name, user_email, password_hash) 
		VALUES ('%s', '%s', '%s', '%s', '%s')", $firstname, $lastname, $username, $email, $password_hash);
	$result = mysql_query($query);
	if (!$result) {
		die("Error: ". mysql_error());
	}

	// Registration successful */
	// echo "Registration successful!";
	header("Location: index.php?registered=true");
}
?>
