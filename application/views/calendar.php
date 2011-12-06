<?= generateHeader($title,base_url())?>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Calendar</div><div class="right">
	<?
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'> Logout</a>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
	?>
</div>
</h1>

<div id="body">
	<?= generateNavBar()?>
    <a class="inText" href=<?= site_url()."/calendar/$previousURI" ?>>Previous Month</a> | 
    <a class="inText" href=<?= site_url()."/calendar/$todayURI" ?>>Current Month</a> | 
    <a class="inText" href=<?= site_url()."/calendar/$nextURI" ?>>Next Month</a>
    <?=$calendar?>
</div>

<?= generateFooter()?>
