<?php

$email 		= 	strip_tags($_POST['email']);
$phone 		= 	strip_tags($_POST['phone']);
$comment 	= 	strip_tags($_POST['message']);
$name 		= 	strip_tags($_POST['name']);
$topic 		=	strip_tags($_POST['subject']);

$_SESSION['contactValues'] = $_POST;

$errors = array();

$req_fields = array(
	'name' => 'Please enter a name',
	'email' => 'Please enter an email address',
	'phone' => 'Please enter an phone number',
);

foreach($req_fields as $field => $msg) {
	if(strip_tags($_POST[$field]) == '')
	$errors[$field] = $msg;
}

if(count($errors)) {
	$_SESSION['contactErrors'] = $errors;
	redirectReferer();
	die;
}


// mailing script here
?>