<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div>
<div class="left">Carpoolamajig</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
       <form name="editProfile" action="users/commitUserData/" method="post">
		 <ol>
			<li>
				<label>Username: <?= $username ?> </label>
			</li>
			<li>
				<label>E-mail:</label>
				<input type="text" name="email" value= <?="$email"?>>
			</li>
			<li>
				<label>Bio:</label>
				<input type="text" name="bio" value="<?=$bio?>">
			</li>
			<li>
				<label>Car Make</label>
				<input type="text" name="carMake" value="<?=$carMake?>">
			</li>
			<li>
				<label>Number of Seats</label>
				<input type="text" name="carSeats" value="<?=$carSeats?>">
			</li>
			<li>
				<label>Desired Gas Compensation</label>
				<input type="text" name="carGasComp" value="<?=$carGasComp?>">
			</li>
			<li>
				<label>Car Amenities</label>
				<input type="text" name="carAmenities" value="<?=$carAmenities?>">
			</li>
			<li>
				<label>Password</label>
				<input type="text" name="password">
			</li>
			<li>
				<label>New Password</label>
				<input type="text" name="newPassword">
			</li>
			<li>
				<label>Confirm Password</label>
				<input type="text" name="confirmPassword">
			</li>
		 </ol>
		 <input type="submit" value="Save Changes">
		 </form>
    </div>
<?echo generateFooter()?>
