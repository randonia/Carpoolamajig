<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div>
<div class="left"><?= $username ?>'s</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
    <p>
	 Bio:<br><?= $bio ?><br><br>
	 Rider Score: <? $riderScore ?><br><br>
	 Pooler Info: <br>
	 <ul>
		 <li>Score: <?= $poolerScore ?><br></li>
		 <li>Car Make: <?= $carMake ?><br></li>
		 <li>Number of Seats: <?= $carSeats ?><br></li>
		 <li>Desired Gas Compensation: $<?= $carGasComp ?><br></li>
		 <li>Car Amenities: <?= $carAmenities ?><br></li>
		 <li>Number of Events Driven For: <?= $numRides ?><br></li>
	 </ul>
    </p>

    
    </div>
<?echo generateFooter()?>
