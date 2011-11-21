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
        #if "eventState is set"
        $data['title'] = "Create a new event!";
        $this->load->view("createEvent",$data);
    }

    function addEvent(){
        $data['title'] = "Event has been added";
        $time = $_POST['dateDay'] . " " . $_POST['dateMonth'] . " " . $_POST['dateYear'];
        $ppeople = -1;
        if($_POST['vis'] == "public"){
            $ppeople = "-1" . "|" . $this->session->userdata('username');
        } else {
            $ppeople = $this->session->userdata('username');
        }
        $query = array( 'date' => strtotime($time),
            'title' => $_POST['eventTitle'],
            'startAddr' => $_POST['startAddr'],
            'endAddr' => $_POST['endAddr'],
            'info' => $_POST['description'],
            'permissionedPeople' => $ppeople);
        echo "QUERY: <br>";
        print_r($query);
    }

    function showEvent($id=0){
        #if no argument is provided, then they should just be forwarded to the main page
        #because fuck you.
        if($id==0){
            redirect(site_url(),"refresh");
        }
        echo $id;
    }
}