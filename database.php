<?php

// Create connection
/************** CREATE DATABASE CONNECTION **************/

	// define connection constants
	defined('db_host')? null : define("db_host", "REDACTED") ;
	defined('db_user')? null : define("db_user", ""REDACTED") ") ;
  defined('db_pass')? null : define("db_pass", ""REDACTED") ") ;
	defined('db_name')? null : define("db_name", ""REDACTED") ") ;


	//database connection proccess
	$conn = mysqli_connect(db_host , db_user , db_pass, db_name);

	// database connection success check

	if (mysqli_connect_errno()) {
		die("Database connection failed." . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}
?>
