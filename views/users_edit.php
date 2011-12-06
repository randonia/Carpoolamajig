<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Edit User</div><div class="right">
	<?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'> Logout</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
	?>
</div>
</h1>

<div id="body">
	<?= generateNavBar()?>
	
	<div id="wrap">
       <form name="editProfile" action="../commitUserData/" method="post">
			<fieldset>
				<legend>Edit your profile!</legend>
				<ol>
					<li>
						<label>Username:</label>
						<input disabled value="<?=$username?>">
					</li>
					<li>
						<label>E-mail:</label>
						<input type="text" name="email" value= "<?=$email?>">
					</li>
					<li>
						<label>Bio:</label>
						<textarea name="bio" rows=4 cols=34><?=$bio?>
						</textarea>
					</li>
					<li>
						<label>Car Make:</label>
						<input type="text" name="carMake" value="<?=$carMake?>">
					</li>
					<li>
						<label>Number of Seats:</label>
						<input type="text" name="carSeats" value="<?=$carSeats?>">
					</li>
					<li>
						<label>Desired Gas Compensation:</label>
						<input type="text" name="carGasComp" value="<?=$carGasComp?>">
					</li>
					<li>
						<label>Car Amenities</label>
						<input type="text" name="carAmenities" value="<?=$carAmenities?>">
					</li>
					<li>
						Change Password?
						<ol>
						<li>
							<label>Old Password:</label>
							<input type="password" name="password">
						</li>
						<li>
							<label>New Password:</label>
							<input type="password" name="newPassword">
						</li>
						<li>
							<label>Confirm Password:</label>
							<input type="password" name="confirmPassword">
						</li>
						</ol>
					</li>
					<li>
						<input type="submit" value="Save Changes">
					</li>
				 </ol>
			</fieldset>
		</form>
    </div>
</div>

<?= generateFooter()?>
