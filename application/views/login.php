<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div>
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
	<label for="username">Username:</label>
    <input type="text" name="username" value="<?
       if($this->session->flashdata('username')){ 
           echo $this->session->flashdata('username');
       }?>">
	</li>
	<li>
	<label for="password">Password:</label>
    <input type="password" name="password">
	</li>
    <input type="submit">
    </form>
	Need an  an account? Register <a class="inText" href="register">here!</a>
    </div>
	   
	   <p class="min"> </p>
	   <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
       <? 
       ?>
	   
</div>
<?= generateFooter()?>
