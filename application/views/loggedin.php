<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>User Registration</h1>
<?
#Here we will figure out where to go:
$dest = base_url();
if($this->session->userdata('destination')){
    $dest .= "index.php/" . $this->session->userdata('destination');
    $this->session->unset_userdata('destination');
}
?>
<div id="body">
       <p>Thank you for logging in <?= $username?>. You can go to your destination <a href="<?=$dest?>">here</a></p>
   
</div>
<?= generateFooter()?>