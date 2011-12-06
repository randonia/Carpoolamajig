<?= generateHeader($title,base_url())?>
<script type="text/javascript">
     function validate(){
			// check will be used to confirm that all forms have been filled out
			var check = document.forms["eventForm"]["eventTitle"].value;
			
			// Check the event title
			if (check == null || check == "")
			{
				alert("Please enter an event title.");
				return false;
			}
			
			// Set check to start address
			check = document.forms["eventForm"]["startAddr"].value;
			// Check the event start street
			if (check == null || check == "")
			{
				alert("Please enter a starting street.");
				return false;
			}
			
			// Set check to start city
			check = document.forms["eventForm"]["startCity"].value;
			// Check the event start city
			if (check == null || check == "")
			{
				alert("Please enter a starting city.");
				return false;
			}
			
			// Set check to start state
			check = document.forms["eventForm"]["startState"].value;
			// Check the event start state
			if (check == null || check == "")
			{
				alert("Please enter a starting state.");
				return false;
			}
			
			// Set check to end address
			check = document.forms["eventForm"]["endAddr"].value;
			// Check the event end street
			if (check == null || check == "")
			{
				alert("Please enter an end street.");
				return false;
			}
			
			// Set check to end city
			check = document.forms["eventForm"]["endCity"].value;
			// Check the event end city
			if (check == null || check == "")
			{
				alert("Please enter an end city.");
				return false;
			}
			
			// Set check to end state
			check = document.forms["eventForm"]["endState"].value;
			// Check the event end state
			if (check == null || check == "")
			{
				alert("Please enter an state.");
				return false;
			}
			
			// Set check to description
			check = document.forms["eventForm"]["description"].value;
			// Check the event description
			if (check == null || check == "")
			{
				alert("Please enter a description for this event.");
				return false;
			}
			
			// Check to make sure the user's selected date hasn't already happened
			if (!checkDate()){
				alert("Unless you have a time machine, please set the event time after the current time.");
				return false;
			}
			
			// If everything is valid
         return true;
     }
	  
	  function checkDate()
	  {
			// Get today's date
			var todayDate = new Date();
			// todayDate = getTime();
			
			// String of months used to find the numerical month value
			// for use in checking the current date against the events
			// proposed date
			var months = "Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec";
			
			// Month value selected by user
			var formMonth = document.forms["eventForm"]["dateMonth"].value;
			// Convert the month from a 3 char string to a number using
			// the months string.
			var eventMonth = months.indexOf(formMonth) / 4;
			
			// Day value selected by user
			var eventDay = document.forms["eventForm"]["dateDay"].value;
			
			// Year value selected by user
			var eventYear = document.forms["eventForm"]["dateYear"].value;
			
			// Create a Date object using the event date values
			var eventDate = new Date();
			eventDate.setFullYear(eventYear,eventMonth,eventDay);
			
			if (eventDate.getFullYear() < todayDate.getFullYear())
			{
				return false;
			}
			else if (eventDate.getFullYear() == todayDate.getFullYear())
			{
				if (eventDate.getMonth() < todayEvent.getMonth())
				{
					return false;
				}
				else if (eventDate.getMonth() == todayEvent.getMonth())
				{
					if (eventDate.getDate() < todayEvent.getDate())
					{
						return false;
					}
				}
			}
			
			return true;
			
	  }
</script>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : Create Event</div><div class="right">
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
	
	<div id="wrap">
<<<<<<< HEAD
		<form name="eventForm" method="post" onsubmit="return validate()" action="addEvent">
			<fieldset>
				<legend>Create Event!</legend>
				<ol>
					<li>
						<label for="eventTitle">Title:</label>
						<input type="text" name="eventTitle" size=50>
					</li>
					<li>
						<label for="dateMonth">Date:</label>
						<select name="dateMonth">
							<option value="Jan">January</option>
							<option value="Feb">February</option>
							<option value="Mar">March</option>
							<option value="Apr">April</option>
							<option value="May">May</option>
							<option value="Jun">June</option>
							<option value="Jul">July</option>
							<option value="Aug">August</option>
							<option value="Sep">September</option>
							<option value="Oct">October</option>
							<option value="Nov">November</option>
							<option value="Dec">December</option>
						</select>
						<select name="dateDay">
							<? 
							   for($i=1; $i<=31;$i++){
								   echo '<option value="' . $i . '">' . $i . "</option>\n";
							   }
							?>
						</select>
						<select name="dateYear">
							<?
								for($i=2011; $i<=2015;$i++){
								   echo '<option value="' . $i . '">' .$i . "</option>\n";
								}
							?>
						</select>
					</li>
					<li>
						<label for="dateHour">Time:</label>
						<select name="dateHour">
							<?
								for($i=0; $i<=23; $i++){
									echo '<option value"' . $i . '">' . $i . "</option>\n";
								}
							?>
						</select>
						<select name="dateMin">
							<?
								for($i=0; $i<=55; $i+=5){
									echo '<option value"' . $i . '">' . $i . "</option>\n";
								}
							?>
						</select>
					</li>
					<li>
						Start Address:
						<ul>
							<li>
								<label for="startAddr">Street:</label>
								<input type="text" name="startAddr" size=40>
							</li>
							<li>
								<label for="startCity">City:</label>
								<input type="text" name="startCity" size=40>
							</li>
							<li>
								<label for="startState">State:</label>
								<input type="text" name="startState" size=40>
							</li>
						</ul>
					</li>
					<li>
						End Address:
						<ul>
							<li>
								<label for="endAddr">Street:</label>
								<input type="text" name="endAddr" size=40>
							</li>
							<li>
								<label for="endCity">City:</label>
								<input type="text" name="endCity" size=40>
							</li>
							<li>
								<label for="endState">State:</label>
								<input type="text" name="endState" size=40>
							</li>
						</ul>
					</li>
					<!-- THIS NEEDS A BIG TEXTBOX! -->
					<li>
						<label for="description">Description:</label>
						<textarea name="description" rows=6 cols=40></textarea>
					</li>
					<li>
						<label for="vis">Visibility:</label>
						<input type="radio" name="vis" value="public" checked>Public</input> <input type="radio" name="vis" value="private">Private</input>
					</li>
					<li>
						<input type="submit">
					</li>
				</ol>
			</fieldset>
		</form>
=======
		Fill in the information for your event!
<form name="eventForm" method="post" onsubmit="return validate()" action="addEvent">
       Title: <input type="text" name="eventTitle" size=50><br>
       Month: <select name="dateMonth">
       <option value="Jan">January</option>
       <option value="Feb">February</option>
       <option value="Mar">March</option>
       <option value="Apr">April</option>
       <option value="May">May</option>
       <option value="Jun">June</option>
       <option value="Jul">July</option>
       <option value="Aug">August</option>
       <option value="Sep">September</option>
       <option value="Oct">October</option>
       <option value="Nov">November</option>
       <option value="Dec">December</option>
       </select>
       Day: <select name="dateDay"><? 
       for($i=1; $i<=31;$i++){
           echo '<option value="' . $i . '">' . $i . "</option>\n";
       }?>
       </select>
       Year: <select name="dateYear"><?
       for($i=2011; $i<=2015;$i++){
           echo '<option value="' . $i . '">' .$i . "</option>\n";
       }?></select>
		 Hour: <select name="dateHour"><?
		 for($i=0; $i<=23; $i++){
			  echo '<option value"' . $i . '">' . $i . "</option>\n";
		 }?></select>
		 Minutes: <select name="dateMin"><?
		 for($i=0; $i<=55; $i+=5){
			  echo '<option value"' . $i . '">' . $i . "</option>\n";
		 }?></select><br>
       Start Address: <br>
				Street:<input type="text" name="startAddr" size=40><br>
				City:<input type="text" name="startCity" size=40><br>
				State:<input type="text" name="startState" size=40><br>
       End Address:  <br>
				Street:<input type="text" name="endAddr" size=40><br>
				City:<input type="text" name="endCity" size=40><br>
				State:<input type="text" name="endState" size=40><br>
       <!-- THIS NEEDS A BIG TEXTBOX! -->
	   <!-- There I fixed it. Probably. -->
       Description: <input type="text" name="description" size=100 height=100><br>
       Visibility: <input type="radio" name="vis" value="public" checked>Public</input> <input type="radio" name="vis" value="private">Private</input><br>

       <input type="submit">
</form>
>>>>>>> df1972a2764fc9780fc2424ea0795c1471a680b6
	</div>
</div>

<?= generateFooter()?>
