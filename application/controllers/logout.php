<? 

class Logout extends CI_Controller{

    function index(){
        $this->load->helper("url");
        $this->session->sess_destroy();
        redirect(base_url(),"refresh");
    }
}

?>