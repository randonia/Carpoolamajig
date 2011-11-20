<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>User Registration</h1>
<div id="body">
       <p>Thank you for registering, <?= $this->session->userdata('username')?>!. You can go back to the main page via this <a href="<?site_url()?>">link</a></p>
   
</div>
<?= generateFooter()?>
