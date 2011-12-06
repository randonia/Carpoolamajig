<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Events</div><div class="right">
	<?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>Logout</a>";
       } else {
           echo "<a class='inHeader' href='" . site_url() . "/login'>Login</a>";
       }
	?>
</div>
</h1>

<div id="body">
		<?= generateNavBar()?>

	<p>
		<a class="inText" href="<?=site_url()."/events/createEvent"?>">Create an event yo!</a>
        <br>Events You Created:<br>   <?= $bigassListOfPwnedEvents?>
        <br>Events You Are Participating In:<br>   <?= $bigassListOfEventsAttending?>
	</p>
	
</div>

<?= generateFooter()?>
