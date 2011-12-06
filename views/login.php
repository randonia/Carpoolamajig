<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Login</div><div class="right">
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
	
	<div id="wrap"><strong>
	<? 
       if($this->session->flashdata('error')){
           echo $this->session->flashdata('error');
       }
    ?><br></strong>
	
	<form name="loginForm" action="login/commitForm/" method="post">
		<fieldset>
			<legend>Login!</legend>
			<ol>
				<li>
					<label id="username" for="username">Username:</label>
					<input type="text" name="username" value="<?
						if($this->session->flashdata('username')){ 
							echo $this->session->flashdata('username');
						}?>">
				</li>
				<li>
					<label id="password" for="password">Password:</label>
					<input type="password" name="password">
				</li>
				<li>
					<input type="submit">
				</li>
				Need an  an account? Register <a class="inText" href=<?= '"'.site_url().'/register"'?>>here!</a><br> 
				Forgot your password? Click <a class="inText" href=<?= '"'.site_url().'/login/resetPassword"'?>>here!</a>
			</ol>
		</fieldset>
    </form>
	</div>
</div>

<?= generateFooter()?>
