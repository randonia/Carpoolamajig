<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Home</div><div class="right">
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
	
    <p>This page/project still under development. <a href="http://cmps183-fall2011.soe.ucsc.edu/doku.php?id=carpoolamajig_project" class="inText">Here</a> is our class project page</p>
	<p class="content">
	This is a content-less page.<br>
	<a href="http://www.youtube.com/watch?v=izGwDsrQ1eQ" class="inText">In the mean time, enjoy this.</a>
	</p>
</div>

<?= generateFooter()?>
