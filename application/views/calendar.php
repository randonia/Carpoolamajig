<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Calendar</div><div class="right">
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
	
	<p>
		THIS IS WHERE THE CALENDAR OF EVENTS GOES! THIS IS EVENTS2!!<br>
		<a class="inText" href="events/createEvent">Create an event hoe</a>
	</p>
</div>

<?= generateFooter()?>
