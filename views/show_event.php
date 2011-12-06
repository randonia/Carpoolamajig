<?= generateHeader($title,base_url())?>
<script type="text/javascript">
	function validate()
	{
		// Ensure that the form value you need to validate exists
		if (document.forms["inviteForm"]["invite"])
		{
			// Create a variable that holds the form's data
			var check = document.forms["inviteForm"]["invite"].value;
			// Check if it is filled out
			if (check == null || check == "")
			{
				alert("This field needs a username... you must have some friends to invite!");
				return false;
			}
		}
		
		return true;
	}
</script>
<?= closeHeader()?>

<h1>
<div class="left">Carpoolamajig : View Event</div><div class="right">
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
    <?=generateNavBar()?>
	   
	<div id="wrap">
		<fieldset>
			<legend>Event: <?=$title?></legend>
			<ol>
				<li>
					Date: <?=date("l, F j, Y @ g:i a",$date)?>
				</li>
				<li>
					Start Address: <?=$startAddr?>
				</li>
				<li>
					End Address: <?=$endAddr?>
				</li>
				<li>
					Information: <?=$info?>
				</li>
				<li>
				<form name="inviteForm" onsubmit="return validate()" action=<?= '"' . site_url() . '/events/addUserToEvent/' . $id . '"'?> method="post">
				<?
					#Check if the person viewing this page created this event
					$arrangedPeople = explode("|",$permissionedPeople);
					#If they did, allow them to invite friends
					if ($arrangedPeople[1] == $this->session->userdata('username')){
						echo "Invite a friend (Enter their username):";
						echo '<input type="text" name="invite" value="'.$invitee.'">';
						echo '<input type="submit" value="Invite"><br>';
					}
					#If they did not, allow them to ask permission to join this event
					else{
						$hasPermission = false;
						foreach ($arrangedPeople as $person){
							if ($person == $this->session->userdata('username')){
							$hasPermission = true;
						}
					}
					if ($hasPermission){
						echo 'You are attending this event!';
					}
					else{
						if ($this->session->flashdata('errNo') == 1){
							echo $this->session->flashdata('errData');
						}
						if ($this->session->flashdata('errNo') == 2){
							echo $this->session->flashdata('errData');
						}
						echo '<input type="submit" value="Request Invitation to Event"><br>';
					}
				}
				?>
				</li>
			</ol>
		</fieldset>
	</div>
	<span class="map"><?=makeGoogleImage($startAddr,$endAddr)?></span>
</div>

<?= generateFooter()?>
