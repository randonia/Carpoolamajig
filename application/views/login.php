<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div> <!-- div tag needs object/map/button start-tag -->
<div class="left">Carpoolamajig : Login</div><div class="right"><a class="inHeader" href="<?=site_url()?>">Home</a></div>
</div>
</h1>
<div id="body">
	 <p class ="nav">
		<a class="inNav" href="<?=site_url()?>/events">Events</a><br>
		<a class="inNav" href="<?=site_url()?>/routes">Routes</a><br>
		<a class="inNav" href="<?=site_url()?>/users">Users</a><br>
		<a class="inNav" href="<?=site_url()?>/search">Search</a><br>
	</p>
	<div id="wrap">
	
	<? 
       if($this->session->flashdata('error')){
           echo $this->session->flashdata('error');
       }
    ?><br>
	   
	<form name="loginForm" action="login/commitForm/" method="post">
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
	<!-- reference to non-existent ID "password", possible missing id attr -->
	<label for="password">Password:</label>
    <input type="password" name="password">
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
