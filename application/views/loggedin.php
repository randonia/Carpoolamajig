<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div class="left">Carpoolamajig : Success!</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'> Logout</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</h1>
<?
#Here we will figure out where to go:
$dest = base_url();
if($this->session->userdata('destination')){
    $dest .= "index.php/" . $this->session->userdata('destination');
    $this->session->unset_userdata('destination');
}
?>
<div id="body">
    <?=generateNavBar()?>
	
    <p>Thank you for logging in <?= $username?>. You can go to your destination <a href="<?=$dest?>" class="inText">here!</a></p>
	
	<p class="min"> </p>
    <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
	We are using <a href="http://codeigniter.com/" class="inText">CodeIgniter</a> for this project. w00tcakes.</p>
</div>
<?= generateFooter()?>