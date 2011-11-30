<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div> #div missing object/map/button start-tag
<div class="left">Carpoolamajig</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "<p class='inText'>Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a></p>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
	 <p class ="nav">
		<a class="inNav" href="index.php/events">Events</a><br>
		<a class="inNav" href="index.php/calendar">Calendar</a><br>
		<a class="inNav" href="index.php/routes">Routes</a><br>
		<a class="inNav" href="index.php/users">Users</a><br>
		<a class="inNav" href="index.php/search">Search</a><br>
	</p>
	
    <p>This page/project still under development. <a href="http://cmps183-fall2011.soe.ucsc.edu/doku.php?id=carpoolamajig_project" class="inText">Here</a> is our class project page</p>
	<p class="content">
	This is a content-less page.<br>
	<a href="http://www.youtube.com/watch?v=izGwDsrQ1eQ" class="inText">In the mean time, enjoy this.</a>
	</p>
	<p class="min"> </p>
    <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
    </div>
<?echo generateFooter()?>
