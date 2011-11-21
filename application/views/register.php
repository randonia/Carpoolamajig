<?= generateHeader($title,base_url())?>
<script type="text/javascript">
		function validate()
		{
			// Sets user to the value of the username form value
			var user = document.forms["registrationForm"]["username"].value;
			
			// Ensure the user entered a username
			if (user == null || user == "")
			{
				alert("Please enter a username.");
				return false;
			}
			
			// Set passOne to the value of the password1 form value
			var passOne = document.forms["registrationForm"]["password1"].value;
			// Ensure that the password is filled in
			if (passOne == null || passOne == "")
			{
				alert("Please enter a password.");
				return false;
			}
			
			// Set passTwo to the value of the password2 form value
			var passTwo = document.forms["registrationForm"]["password2"].value;
			// Ensure that the password confirm is filled in
			if (passTwo == null || passTwo == "")
			{
				alert("Please confirm your password.");
				return false;
			}
			
			// Check to make sure the two passwords are the same
			if (passOne != passTwo)
			{
				alert("Passwords do not match");
				return false;
			}
			
			// Set email to the value of the email form value
			var email = document.forms["registrationForm"]["email"].value;
			// Ensure that the email is filled in
			if (email == null || email == "")
			{
				alert("Please enter an email.");
				return false;
			}
			
			// Check if the email address entered is a valid email address
			var AtSignPosition = email.indexOf("@");
			var LastDotPosition = email.lastIndexOf(".");
			if (AtSignPosition < 1 || LastDotPosition < AtSignPosition +2 || LastDotPosition + 2 > email.length)
			{
				alert("Please enter a valid e-mail address!");
				return false;
			}
			
			// If everything is valid
			return true;
			
		}
</script>
<?= closeHeader()?>
<h1>New User Registration Form</h1>
<div id="body">
   <p><? 
       if(isset($errorcode)){ 
        switch($errorcode){
         case 'improperInput':
           echo "You failed to register properly. Please check your inputs.";
           break;
         case 'usernameTaken':
           echo "You tried registering a username that was already taken";
           break;
         default:
           echo "Uncaught errorcode: " . $errorcode;
           break;
           }
       }
       ?>
 <form name="registrationForm" onsubmit="return validate()" action="register/commitForm/" method="post">
	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password1"><br>
	Confirm Password: <input type="password" name="password2"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="Register!">
    <input type="reset"><br>
   </form>
   </p>
</div>
<?= generateFooter()?>
