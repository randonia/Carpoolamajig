<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1><div>
<div class="left">Events</div><div class="right"><?
       #check for the login or "you are logged in as" bit
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a href="index.php/login">Login</a>';
       }
?></div>
</div>
</h1>

<div id="body">
	<p class ="nav">
		<a class="inNav" href="<?=site_url()?>/events">Events</a><br>
		<a class="inNav" href="<?=site_url()?>/routes">Routes</a><br>
		<a class="inNav" href="<?=site_url()?>/users">Users</a><br>
		<a class="inNav" href="<?=site_url()?>/search">Search</a><br>
	</p>
<p>
THIS IS WHERE THE CALENDAR OF EVENTS GOES!<br>
<a href="createEvent">Create an event hoe</a>
</p>
</div>
	   <p class="min"> </p>
	   <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
       <? 
       ?>
<?echo generateFooter()?>