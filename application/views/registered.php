<?= generateHeader($title)?>
<?= closeHeader()?>
<h1>User Registration</h1>
<div id="body">
       <p>Thank you for registering, <?= $this->session->userdata('user')?>!. You can go back to the main page via this <a href="../../">link</a></p>
   
</div>
<?= generateFooter()?>