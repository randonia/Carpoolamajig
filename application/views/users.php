<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div>
<div class="left">Carpoolamajig</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
       
    </div>
<?echo generateFooter()?>
