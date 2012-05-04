<html>
<head>
	<title>Validation</title>
</head>
<body>
<?php if(isset($_SESSION['contactSuccess'])) { //if php was used to submit ?>
	<h4>Thanks for your enquiry - someone will be in touch soon</h4>
<?php } 

	global $values;
	global $errors;
	
	function field($title, $name, $type='text', $other='') {
		global $values;
		global $errors;
		$reqstar = ($other) ? '<span class="required">*</span>' : '' ;
		$result  = '<label for="' . $name .'">' . $title . $reqstar . '</label>';
		$result .= '<input type="' . $type .'" title="' . $title .'" name="' . $name .'" id="' . $name .'" value="' . $values[$name] .'"' . $other .'>';
		return $result;
	}

	function required_field($title, $name, $message, $type='text') {
		global $values;
		global $errors;

		$errorfield = ($errors[$name]) ? ' class="errorfield"' : '' ;
		$message = ' data-required="' . $message . '"' . $errorfield;
		$result = field($title, $name, $type, $message);
		$result .= ($errors[$name]) ? '<span class="inline error" style="display: inline;">'. $errors[$name] . '</span>' : '';
		return $result;
	}

	if(isset($_SESSION['contactSuccess'])) {
		unset($_SESSION['contactSuccess']);
		unset($_SESSION['contactValues']);
		unset($_SESSION['contactErrors']);
	}

	if(isset($_SESSION['contactValues'])) {
		$values = $_SESSION['contactValues'];
		unset($_SESSION['contactValues']);
	}
	if(isset($_SESSION['contactErrors'])) {
		$errors = $_SESSION['contactErrors'];
		unset($_SESSION['contactErrors']);
	}
?>
	<form class="js_validation" action="vendor-signup-process.php" method="post">
		<fieldset>
				<?=required_field('Your Name', 'name', 'Please enter your name')?>
				<?=required_field('Email', 'email', 'Please enter your email', 'email')?>
				<?=required_field('Email', 'tel', 'Please enter your phone number', 'tel')?>
				<?=field('Something Else', 'other')?>

			<span class="required">* Required Field</span>
			<input type="submit" title="Send" value="Send" class="sendform">
		</fieldset>
		<div class="js_thankyou"></div>
	</form>
</body>
</html>