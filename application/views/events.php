<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1><div>
<div class="center">View Events</div><div class="login"><?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a href="index.php/login">Login</a>';
       }
?>
</div>
</div>
</h1>

<div id="body">

</div>

<?echo generateFooter()?>