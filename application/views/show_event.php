<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div>
<div class="left">Carpoolamajig</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "<p class='inText'>Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a></p>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
	 <p class ="nav">
		<a class="inNav" href="index.php/events">Events</a><br>
		<a class="inNav" href="index.php/calendar">Calendar</a><br>
		<a class="inNav" href="index.php/routes">Routes</a><br>
		<a class="inNav" href="index.php/users">Users</a><br>
		<a class="inNav" href="index.php/search">Search</a><br>
	</p>
		<div id="wrap">
		<fieldset>
		<ul>
			<li>
				Title: <?=$title?>
			</li>
			<li>
				Date: <?=$date?>
			</li>
			<li>
				Start Address: <?=$startAddr?>
			</li>
			<li>
				End Address: <?=$endAddr?>
			</li>
			<li>
				Information: <?=$info?>
			</li>
		</ul>
		</fieldset>
		</div>
    </div>
<?echo generateFooter()?>
