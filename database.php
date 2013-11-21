<?php
// Checks for mysql errors
function mysql_prep($value) {
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string"); // i.e PHP >= v4.3.0
	
	if ($new_enuogh_php) 
	{
		// undo any magic quote effects to mysql_real_escape_string can do the work
		if($magic_quotes_active) 
		{
			$value = stripcslashes($value);
		}
		$value = mysql_real_escape_string($value);
	} else { // Before PHP v4.3.0
		// if magic quotes arn't areadly on then add slashes manually
		if(!$magic_quotes_active)
		{
			$value = addslashes($value);
		}
		// if magic quotes are active, then slashes already exist.
	}
	return $value;
}

// Redirecting pages
function redirect_to($location = NULL) {
if($location != NULL) 
	{
	header("Location: {$location}");
	exit;
	}
}

// Checks the database query
function confirm_query($result_set) 
{
	if (!$result_set) 
	{
		die("Database query failed: " . mysql_error());
	}
}
?>
