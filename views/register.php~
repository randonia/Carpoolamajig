<?= generateHeader($title)?>
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
 <form name="registrationForm" action="register/commitForm/" method="post">
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