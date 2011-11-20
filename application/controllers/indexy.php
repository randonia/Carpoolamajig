<?
class Indexy extends CI_Controller{
    function index(){
        $data['title'] = "Welcome!";
        $this->load->view("home",$data);
    }
}

?>