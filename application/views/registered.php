<?= generateHeader($title)?>
<?= closeHeader()?>
<h1>User Registration</h1>
<div id="body">
       <p>Thank you for registering, <?= $this->session->userdata('user')?> !</p>
   
</div>
<?= generateFooter()?>