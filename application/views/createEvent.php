<?= generateHeader($title,base_url())?>
<script type="text/javascript">
     function validate(){
         return false;
     }
</script>
<?= closeHeader()?>
<h1><div>
<div class="left">Events</div><div class="right"><?
       #check for the login or "you are logged in as" bit
       if($this->session->userdata('username')){
           echo "Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a href='" . site_url() . "/logout'>|Logout|</a>";
       } else {
           echo '<a href="index.php/login">Login</a>';
       }
?></div>
</div>
</h1>

<div id="body">
<p>
Fill in the information for your event!
<form method="post" onsubmit="validate()">
       Title: <input type="text" name="eventTitle" size=50><br>
       Month: <select name="dateMonth">
       <option value="1">January</option>
       <option value="2">February</option>
       <option value="3">March</option>
       <option value="4">April</option>
       <option value="5">May</option>
       <option value="6">June</option>
       <option value="7">July</option>
       <option value="8">August</option>
       <option value="9">September</option>
       <option value="10">October</option>
       <option value="11">November</option>
       <option value="12">December</option>
       </select>
       Day: <select name="dateDay"><? 
       for($i=1; $i<=31;$i++){
           echo '<option value="' . $i . '">' . $i . "</option>\n";
       }?>
       </select>
       Year: <select name="dateYear"><?
       for($i=2011; $i<=2015;$i++){
           echo '<option value="' . $i . '">' .$i . "</option>\n";
       }?></select><br>
       Start Address: <input type="startAddr" size=40><br>
       End Address: <input type="endAddr" size=40><br>
       <!-- THIS NEEDS A BIG TEXTBOX! -->
       Description: <input type="info" size=50 height=50><br>
       Visibility: <input type="radio" name="vis" value="public">Public</input> <input type="radio" name="vis" value="private">Private</input><br>
       <input type="submit">
</form>

</p>
</div>

<?echo generateFooter()?>