<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1><div>
<div class="left">Events</div><div class="right"><?
       #check for the login or "you are logged in as" bit
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a href="index.php/login">Login</a>';
       }
?></div>
</div>
</h1>

<div id="body">
<p>
STUFF
</p>
</div>

<?echo generateFooter()?>