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
<h1>
<!-- 2 errors this line, both with div tags missing object/map/button start-tag -->
<div class="left">Carpoolamajig : Register</div><div class="right"><a class="inHeader" href="<?=site_url()?>">Home</a></div>
</h1>
<div id="body">
	<p class ="nav">
		<a class="inNav" href="<?=site_url()?>/events">Events</a><br>
		<a class="inNav" href="<?=site_url()?>/routes">Routes</a><br>
		<a class="inNav" href="<?=site_url()?>/users">Users</a><br>
		<a class="inNav" href="<?=site_url()?>/search">Search</a><br>
	</p>
	<div id="wrap">
	<? 
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
 <fieldset>
 <legend>Make An Account!</legend>
 <ol>
 <li>
 <!-- reference to non-existent id "username", poss missing id attr -->
 <label for="username">Username:</label>
 <input type="text" name="username">
 </li>
 <li>
 <!-- reference to non-existent id "password1", poss missing id attr -->
 <label for="password1">Password:</label>
 <input type="password" name="password1">
 </li>
 <li>
 <!-- ref to non-existent id "password2", poss missing id attr -->
 <label for="password2">Confirm Password:</label>
 <input type="password" name="password2">
 </li>
 <li>
 <!-- ref to non-existent id "email", poss missing id attr -->
 <label for="email">E-mail:</label>
 <input type="text" name="email">
 </li>

<!-- input needs li start tag in 4.01 strict -->
	<li>
	<input type="submit" value="Register!">
    <input type="reset">
	</li>
	</ol>
	</fieldset >
	</form>
</div>

	<p class="min"> </p>
		<p class="footer">
			<? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
	We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
		   <? 
		   ?>
</div>
<?= generateFooter()?>
