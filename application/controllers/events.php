<?
class Events extends CI_Controller{
    function index(){
        if($this->session->userdata('username')){
            #load the view now :D
            $data['title'] = "Carpoolmajig Events Page";
            $this->load->view("events",$data);
        } else {
            #if you aren't logged in, redirect to the login page
            #and include the destination session data so it knows where to 
            #send you so you don't have to get a dickpunch from Alex
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
        $time = $_POST['dateDay'] . " " . $_POST['dateMonth'] . " " . $_POST['dateYear'] . " " . $_POST['dateHour'] . ":" . $_POST['dateMin'];
        echo "<BR><BR>::" .$time ."<br><br>";
        $ppeople = -1;
        if($_POST['vis'] == "public"){
            $ppeople = "-1" . "|" . $this->session->userdata('username');
        } else {
            $ppeople = $this->session->userdata('username');
        }
        $query = array( 'date' => strtotime($time),
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
        #fuck
        $query = $this->db->get('events');
        #this
        $uuid = "";
        #silly
        foreach($query->result() as $row){
            #sauce
            $uuid = $row->uuid;
        }
        redirect(site_url() . "/events/showEvent/" . $uuid,"redirect");
#        $this->showEvent($uuid);
    }

    function showEvent($id=0){
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
        #check for user privies
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
            if(!$flag){
                $permPeople .= "|" . $username;
                $this->db->where('uuid',$id);
                $this->db->update('events',array('permissionedPeople'=>$permPeople));
                #load the page again?
            }
        } else {
            #Give them an error
        }
        $this->showEvent($id);
    }
}