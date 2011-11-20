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
    <p>This page/project still under development. <a href="http://cmps183-fall2011.soe.ucsc.edu/doku.php?id=carpoolamajig_project" class="inText">Here</a> is our class project page</p>
    <p>Pages we have up: <br>
       <ul>
       <li><a class="inNav" href="index.php/register">Registration Page</a></li>
       <li><a class="inNav" href="index.php/login">Login Page</a></li>
       <li><a class="inNav" href="index.php/events">Events Page</a></li>
       </ul>
    </p>
        <a href="http://www.youtube.com/watch?v=izGwDsrQ1eQ" class="inNav">In the mean time, enjoy this.</a>
    </p>

    <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/" class="inNav">CodeIgniter</a> for this project. w00tcakes.</p>
       <? 
       ?>
    </div>
<?echo generateFooter()?>
