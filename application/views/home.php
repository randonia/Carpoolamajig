<?echo generateHeader($title)?>

    <h1>Carpoolamajig</h1>
    <div id="body">
    <p>This page/project still under development. <a href="http://cmps183-fall2011.soe.ucsc.edu/doku.php?id=carpoolamajig_project">Here</a> is our class project page<br>
        <a href="http://www.youtube.com/watch?v=izGwDsrQ1eQ">In the mean time, enjoy this.</a>
    </p>
         <p class="footer">
         <? if(isset($dateMod)){echo "This page was last updated on $dateMod";}?> 
We are using <a href="http://codeigniter.com/">CodeIgniter</a> for this project. w00tcakes.</p>
    </div>

<?echo generateFooter()?>