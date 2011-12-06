<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : View User</div><div class="right">
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
		<fieldset>
			<legend><?= $username ?>'s Bio</legend>
			<ol>
				<li>
					Bio:<br>
					<?= $bio ?>
				</li>
				<li>
					Rider Score: <?= $riderScore ?>
				</li>
				<li>
				Pooler Info:
					<ol>
						<li>
							Score: <?= $poolerScore ?>
						</li>
						<li>
							Car Make: <?= $carMake ?>
						</li>
						<li>
							Number of Seats: <?= $carSeats ?>
						</li>
						<li>
							Desired Gas Compensation: $<?= $carGasComp ?>
						</li>
						<li>
							Car Amenities: <?= $carAmenities ?>
						</li>
						<li>
							Number of Events Driven For: <?= $numRides ?>
						</li>
					</ol>
				</li>
			</ol>
		</fieldset>
	</div>
</div>
	
<?= generateFooter()?>
