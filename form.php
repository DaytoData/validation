<html>
<head>
	<title>Validation</title>
</head>
<body>

<form method="post" action="form-process.php" class="js_validation <?php $errors = $_SESSION['contactErrors']; echo (count($errors)) ? ' errorform' : ''; ?>">
		<fieldset>
			<?=(count($errors)) ? '<span class="error long">There appears to be an error. Please make sure you have filled in all the required fields.<br>Those that have been missed are highlited red</span>' : '' ?>
			<div class="formsfield"><label for="name">Name<span>*</span></label>
			<input type="text" required id="name" name="name" value="<?=$_SESSION['contactValues']['name']?>"<?=($errors['name']) ? ' class="errorfield"' : '' ?> data-required="Please enter your name" /></div>
			<div class="formsfield"><label for="email">Email<span>*</span></label>
			<input type="email" required id="email" name="email" value="<?=$_SESSION['contactValues']['email']?>"<?=($errors['email']) ? ' class="errorfield"' : '' ?>  data-required="Please enter an email address" /></div>
			<div class="formsfield"><label for="phone">Phone<span>*</span></label>
			<input type="tel" required id="phone" name="phone" value="<?=$_SESSION['contactValues']['phone']?>"<?=($errors['phone']) ? ' class="errorfield"' : '' ?> data-required="Please enter a phone number" /></div>
			<div class="formsfield"><label for="subject" name="subject">Subject</label>
			<input id="subject" name="subject" value="<?=$product->name?>"/></div>
			<label for="message">Message</label>
			<textarea id="message" name="message"><?=$_SESSION['contactValues']['message']?></textarea></div>
			<a class="js_closeform closeform">Close the form</a>
			<input type="submit" value="Send" />
			<span class="req">* Required Fields</span>
		</fieldset>
	</form>
</body>
</html>