<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Password Reset</div><div class="right">
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
	
	<div id="wrap">
		<strong>
		<? 
		   if($this->session->flashdata('error')){
			   echo $this->session->flashdata('error');
		   }
		?>
		</strong>
		
		<form name="recoveryForm" action=<?='"' . site_url() . '/login/emailResetPassword/"'?> method="post">
			<fieldset>
				<legend>Reset Password</legend>
				<ol>
					<li>
						<label id="username" for="username">Username:</label>
						<input type="text" name="username" value="<?
							if($this->session->flashdata('username')){ 
							echo $this->session->flashdata('username');
							}?>">
					</li>
					<li>
						<label id="email" for="email">Email:</label>
						<input type="text" name="email">
					</li>
					<li>
						<input type="submit">
					</li>
				</ol>
				Need an  an account? Register <a class="inText" href=<?= '"'.site_url().'/register"'?>>here!</a>
			</fieldset>
		</form>
    </div>
</div>

<?= generateFooter()?>