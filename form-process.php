<?php

session_start();

$fields = array('name', 'email', 'tel', 'other'); // all your form fields

foreach($fields as $field) { //loops through and assigns the values to an array
	$field_values[$field]	= 	strip_tags($_POST[$field]);
}

header('Location: form.php'); // where the page redriects to

$_SESSION['contactValues'] = $_POST; // assigns all form values to session to store filled in values

$errors = array(); //makes an array

//all your required fieds and their error message
$req_fields = array(
	'name' => 'Please enter your name',
	'email' => 'Please enter your email',
	'tel' => 'Please enter a telephone address',
);

foreach($req_fields as $field => $msg) { //checks required fields and assigns error message to array
	if(strip_tags($_POST[$field]) == '')
		$errors[$field] = $msg;
}

if(count($errors)) { // if there are errors, store them in the session and die (goes back to header)
	$_SESSION['contactErrors'] = $errors;
	die;
}

// email details
$mailto = '';
$subject = "";
$headers = 'From: Me <info@YOURDOMAIN.com>'; // who the email comes from - don;t do users email as there could be bouncebacks
$message = "You received a message via the website.\n\n";

foreach($fields as $field_name) { //builds the email content
	$message .= $field_name . ": " . $field_values[$field_name] . "\n\n";
}

if(!mail($mailto,$subject,$message,$headers)) {
	$errors['mail'] = "Couldn't send message. Please try again later.";
} else {
	//unsets the values and errors and then sets contact success
	unset($_SESSION['contactErrors']);
	unset($_SESSION['contactValues']);
	$_SESSION['contactSuccess'] = true;
	die;
}

?>