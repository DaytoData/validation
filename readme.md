#Validation

This is a vary basic vaildation thing. It needs no initialisation, just copy and paste the js, add a couple of classes and away we go. It works on both input blur (when an input loses focus) and form submission.

**Please Note: the code is not complete and still has some bugs!!**

##Quick Start

 - Copy the JS and PHP from **validation.js**,  **form-process.php** and **form.php**
 - Add the class 'js_vaildation'
 - Add the **data-required** attribute to any fields you need required
 - Open up form-process.php add/remove any fields from the required array

Done

Obviously there is a lot more unexplained php (sessions and such) going on, But the instructions above *should* get you on your way.

##Long Start

Below are the beginnings of the long documentation. The working code will be here: http://jsfiddle.net/cPzBC/3/. PHP can be found here: http://codepad.org/4FyXLojE

**Please note - this documentation is not complete**

##Javascript

###.js_validation

First off, make your form like you normally would (with action and method and such). Then add js_validation as a class. Simple.

###data-required

The validation looks at the attribute and content of data-required to decide if the field is required and what error message to display. When validating, the engine also looks at the type of the input, and makes sure that the value is valid (at time of writing it validates tel and email)
e.g.
	 <input type="tel" id="phone" name="phone" data-required="Please enter a phone number" />

This will firstly make sure that the field is not emtpy. If it has content it will then validate the content as a phone number.

