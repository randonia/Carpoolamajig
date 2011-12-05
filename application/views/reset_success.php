<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>
<div class="left">Carpoolamajig : Reset Success</div><div class="right"></div>
</h1>
<div id="body">
	 <?=generateNavBar();?>
	<div id="wrap">
	
	<? 
       if($this->session->flashdata('error')){
           echo $this->session->flashdata('error');
       }
    ?><br>
	   
	You have successfully reset your password! Return home <a href=<?='"'.site_url().'"'?>>here!</a>
    </div>
	   
</div>
<?= generateFooter()?>
