<?= generateHeader($title)?>
<?= closeHeader()?>
<h1>Registration Form</h1>
<div id="body">
   <p><? if(isset($errorcode)){ echo $errorcode;}?>
   <form name="registrationForm" action="commitForm" method="post">
	Username: <input type="text" name="username"><br>
	Password: <input type="text" name="password1"><br>
	Confirm Password: <input type="text" name="password2"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="Register!"><br>
   </form>
   </p>
</div>
<?= generateFooter()?>