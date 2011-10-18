<? 

class Home extends CI_Controller{

    function index(){
        $data['title'] = "Carpoolamajig Homepage!";
        $data['dateMod'] = "Oct 18th";
        $this->load->view("home",$data);
    }

}

?>