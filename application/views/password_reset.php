<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div class="left">Carpoolamajig : Password Reset</div><div class="right"></div>
</h1>
<div id="body">
	 <p class ="nav">
		<a class="inNav" href="<?=site_url()?>">Home</a><br>
		<a class="inNav" href="index.php/events">Events</a><br>
		<a class="inNav" href="index.php/calendar">Calendar</a><br>
		<a class="inNav" href="index.php/routes">Routes</a><br>
		<a class="inNav" href="index.php/users">Users</a><br>
		<a class="inNav" href="index.php/search">Search</a><br>
	</p>
	<div id="wrap">
	
	<? 
       if($this->session->flashdata('error')){
           echo $this->session->flashdata('error');
       }
    ?><br>
	   
	<form name="recoveryForm" action="login/resetPassword/" method="post">
	<fieldset>
	<legend>Login!</legend>
	<ol>
	<li>
	<!-- reference to non-existent ID "username", possible missing id attr -->
	<label for="username">Username:</label>
	
	<!-- input possibly missing li tag -->
    <input type="text" name="username" value="<?
       if($this->session->flashdata('username')){ 
           echo $this->session->flashdata('username');
       }?>">
	</li>
	<li>
	<!-- reference to non-existent ID "email", possible missing id attr -->
	<label for="email">Email:</label>
    <input type="email" name="email">
	</li>
	<li>
    <input type="submit">
	</li>
	<!-- should be a close ol here -->
	</ol>
	<!-- end fieldset tag should go here -->
	Need an  an account? Register <a class="inText" href="register">here!</a>
	</fieldset>
    </form>
    </div>
	   
	   <p class="min"> </p>
	   <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
       <? 
       ?>
	   
</div>
<?= generateFooter()?>
