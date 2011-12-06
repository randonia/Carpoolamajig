<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Register Success!</div><div class="right">
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
	
       <p>Thank you for registering, <?= $this->session->userdata('username')?>! You can go back to the main page by clicking <a class="inText" href="<?=site_url()?>">here!</a>
	   </p>
</div>

<?= generateFooter()?>
