<?
class Events extends CI_Controller{
    function index(){
        if($this->session->userdata('username')){
            #load the view now :D
            $data['title'] = "Carpoolmajig Events Page";
            #This will be the "Bigass List of Events you're attending"
            $data['bigassListOfEventsAttending'] = "";
            #This will be the "Bigass list of Events that you own"
            $data['bigassListOfPwnedEvents'] = "";
            #Go through ALL OF THE GODAMN EVENTS and see what events you're attending
            $this->db->select('*');
            $query = $this->db->get('events');
            foreach($query->result() as $row){
                #IF this person owns it, add them to the thingy
                $arr = explode('|',$row->permissionedPeople);
                if($arr[1] == $this->session->userdata('username')){
                    $str = makeLinkToEvent($row->uuid,$row->title);
                    $data['bigassListOfPwnedEvents'] .= $str . "<br>";
                    $data['bigassListOfEventsAttending'] .= $str . "<br>";
                    continue;
                }
                #see if this person is in the permissioned people
                for($i=0; $i<count($arr); $i++){
                    if($arr[$i] == $this->session->userdata('username')){
                        #toss it on in!
                        $data['bigassListOfEventsAttending'] .= makeLinkToEvent($row->uuid,$row->title) . "<br>";
                    }
                }
            }

            $this->load->view("events",$data);
        } else {
            #if you aren't logged in, redirect to the login page
            #and include the destination session data so it knows where to 
            #send you
            $this->session->set_flashdata('error','You need to be logged in to view this page');
            $this->session->set_userdata('destination','events');
            redirect("login","refresh");
        }
    }

    function createEvent(){
        #If you're logged in
        # HEY BUNNY: This is where you can look for the "If you're logged in" code
        if($this->session->userdata('username')){
            $data['title'] = "Create a new event!";
            $this->load->view("createEvent",$data);
        } else {
            $this->session->set_flashdata('error','You need to be logged in to view this page');
            $this->session->set_userdata('destination','events/createEvent');
            redirect("login","refresh");
        }
    }

    function addEvent(){
        $data['title'] = "Event has been added";
        $intime = $_POST['dateDay'] . " " . $_POST['dateMonth'] . " " . $_POST['dateYear'] . " " . $_POST['dateHour'] . ":" . $_POST['dateMin'];
#        echo "<BR><BR>::" .$intime ."<br><br>";
        $ppeople = -1;
        if($_POST['vis'] == "public"){
            $ppeople = "-1" . "|" . $this->session->userdata('username');
        } else {
            $ppeople = "1" . "|" . $this->session->userdata('username');
        }
        $query = array( 'date' => strtotime($intime),
            'title' => $_POST['eventTitle'],
            'startAddr' => $_POST['startAddr'] . " " . $_POST['startCity'] . " " . $_POST['startState'],
            'endAddr' => $_POST['endAddr'] . " " . $_POST['endCity'] . " " . $_POST['endState'],
            'info' => $_POST['description'],
            'permissionedPeople' => $ppeople);
        # insert the above ^ from the form into the events DB
        $this->db->insert('events',$query);
        # now we grab the max uuid to redirect the user to their just made
        # event page
        $this->db->select_max('uuid');
        #this
        $query = $this->db->get('events');
        #is
        $uuid = "";
        #incredibly
        foreach($query->result() as $row){
            #silly
            $uuid = $row->uuid;
        }
        redirect(site_url() . "/events/showEvent/" . $uuid,"refresh");
#        $this->showEvent($uuid);
    }

    function showEvent($id=0,$invite=""){
        #if no argument is provided, then they should just be forwarded to the main page
        # because fuck you.
        if($id==0){
            redirect(site_url(),"refresh");
        }
        $query = $this->db->get_where('events',array('uuid'=>$id));
        foreach($query->result() as $row){
            #this is baus
            #print_r($row);
            $eventData['date'] = $row->date;
            $eventData['title'] = $row->title;
            $eventData['startAddr'] = $row->startAddr;
            $eventData['endAddr'] = $row->endAddr;
            $eventData['info'] = $row->info;
            $eventData['permissionedPeople'] = $row->permissionedPeople;
            $eventData['id'] = $row->uuid;
        }
        $eventData['invitee'] = $invite;
        $this->load->view("show_event",$eventData);
    }

    function editEvent($id=0){
        #if no id is provided, redirect!
        if($id==0){
            redirect(site_url(),"refresh");
        }
        $data['title'] = "Edit Event";
        $this->db->select('*');
        #grab all the datas from the events page
    }

    #adds a user to an event
    function addUserToEvent($id=0){
        #handle malformed URIs
        if($id==0){
            redirect(site_url(),"refresh");
        }

        #if invite exists, we're adminning, otherwise, it's a request
        if(isset($_POST['invite'])){
            #check for user privileges
            $query = $this->db->get_where('events',array('uuid'=>$id));
            $permPeople = "";
            foreach($query->result() as $row){
                $permPeople = $row->permissionedPeople;
                $permPeopleArr = explode("|",$permPeople);
            }
            #Czech if this person has permissions to edit the event!
            $username = $_POST['invite'];
            if($permPeopleArr[1] == $this->session->userdata('username')){
                #now update some shit!
                #first check to see if they aren't already in the permPeople
                $flag = false;
                foreach($permPeopleArr as $person){
                    if($person == $username){
                        #the person already is in here
                        $flag = true;
                        break;
                    }
                }
                if(!$flag && $_POST['invite']){
                    $permPeople .= "|" . $username;
                    $this->db->where('uuid',$id);
                    $this->db->update('events',array('permissionedPeople'=>$permPeople));
                    #load the page again?
                }
            } else {
                #Give them an error
            }
        } else { #if $_POST['invite'] DNE, then the user is sending a request!
            #grab the username from session:
            $currentusername = $this->session->userdata('username');
            $this->db->select('*');
            $query = $this->db->get_where("events",array('uuid'=>$id));
            $permPeople = "";
            $eventName = "";
            foreach($query->result() as $row){
                $permPeople = $row->permissionedPeople;
                $eventName = $row->title;
            }
            $essploded = explode("|",$permPeople);
            $owner = $essploded[1];
            #***
            # Prevent this email from being sent a lot, we can do it in session data
            #***
            
            $spamCheck = explode("|",$this->session->userdata('requestedAccessIDs'));
            $spamFlag = false;
            for($i=0; $i<count($spamCheck); $i++){
                if($id == $spamCheck[$i]){
                    $spamFlag = true;
                }
            }
            if($spamFlag){
                $this->session->set_flashdata('errNo','1');
                $this->session->set_flashdata('errData','You have already requested access to this event');
                redirect(site_url() . "/events/showEvent/" . $id,"refresh");
            }

            #get the email of both users
            $requesterEmail='';
            $query = $this->db->get_where('users',array('username'=>$currentusername));
            foreach($query->result() as $row){
                $requesterEmail = $row->email;
            }
            #now get the owner
            $query = $this->db->get_where('users',array('username'=>$owner));
            $ownerEmail='';
            foreach($query->result() as $row){
                $ownerEmail = $row->email;
            }

            $this->load->library('email');
            $this->email->to($ownerEmail);
            $this->email->from("god@carpoolamajig.com",'Gob');
            $this->email->subject($currentusername . " has requested permission to view " . $eventName);
            $this->email->message("Hello " . $owner . "\n\r" . $currentusername . " has requested permission to view the event titled: " . $eventName . ". You can grant them permission by going to the event page and entering their username in the 'Invite a Friend' field of the event page. You can go straight to the event page with this link: \n\r " . site_url() . "/events/showEvent/" . $id . "/" . $currentusername . "\n\rThank you!\n\rGob ");
            $this->email->send();
            
            $foo = $this->session->userdata('requestedAccessIDs');
            $foo .= "|" . $id;
            $this->session->set_userdata('requestedAccessIDs',$foo);
        }
        $this->session->set_flashdata('errNo','2');
        $this->session->set_flashdata('errData','Access request sent!');
        redirect(site_url() . "/events/showEvent/" . $id,"refresh");
#        $this->showEvent($id);
    }
}
