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
				alert("I'm sorry you don't have any friends, but this field needs a username.");
				return false;
			}
		}
		
		return true;
	}
</script>
<?= closeHeader()?>
<h1>
<div>
<div class="left">Carpoolamajig</div><div class="right"><?
       if($this->session->userdata('username')){
           echo "<p class='inText'>Logged in as: " . $this->session->userdata('username') . " ";
           echo "<a class='inHeader' href='" . site_url() . "/logout'>|Logout|</a></p>";
       } else {
           echo '<a class="inHeader" href="' . site_url() . '/login">Login</a>';
       }
?></div>
</div></h1>
    <div id="body">
       <?=generateNavBar()?>
		<div id="wrap">
		<fieldset>
		<ul>
			<li>
				Title: <?=$title?>
			</li>
			<li>
       Date: <?=date("l, F j Y g:i a",$date)?>
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
					echo '<input type="text" name="invite">';
					echo '<input type="submit" value="Invite"><br>';
				}
				#If they did not, allow them to ask permission to join this event
				else{
					$hasPermission = false;
					foreach ($arrangePeople as $person){
						if ($person == $this->session->userdata('username')){
							$hasPermission = true;
						}
					}
					if ($hasPermission){
						echo 'You are attending this event!';
					}
					else{
						echo '<input type="submit" value="Request invitation to Event"><br>';
					}
				}
			?>
			</li>
		</ul>
       <?=makeGoogleImage($startAddr,$endAddr)?>
		</fieldset>
		</div>
    </div>
<?echo generateFooter()?>
