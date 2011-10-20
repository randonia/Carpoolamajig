<? 

class Home extends CI_Controller{

    function index(){
        $data['title'] = "Carpoolamajig Homepage!";
        $data['dateMod'] = date("D F d, Y H:i:s", getlastmod());
        $this->load->view("home",$data);
    }

}

?>