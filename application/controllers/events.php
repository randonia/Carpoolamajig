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
        if(!$this->session->flashdata('eventState')){
            $data['title'] = "Create a new event!";
            $this->load->view("createEvent",$data);
        } else {
            if($this->session->userData('username')){
                
            }
            if($id==0){
                
            }
        }
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