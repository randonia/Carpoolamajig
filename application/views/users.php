<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Users</div><div class="right">
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
	
	<a class="inText" href="<?= 'users/editUser/' . $this->session->userdata('username')?>">Edit User</a>   
</div>
	
<?= generateFooter()?>
