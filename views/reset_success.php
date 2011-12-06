<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Reset Success!</div><div class="right">
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
	 
	<? 
		if($this->session->flashdata('error')){
			echo $this->session->flashdata('error');
		}
	?><br>
	You have successfully reset your password! Return home <a class="inText" href=<?='"'.site_url().'"'?>>here!</a>
</div>

<?= generateFooter()?>
