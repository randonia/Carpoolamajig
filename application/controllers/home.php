<? 

class Home extends CI_Controller{

    function index(){
        $data['title'] = "Carpoolamajig Homepage!";
        $data['dateMod'] = date("D F d, Y H:i:s", filemtime("application/controllers/home.php"));
        #if(!$data['uuid']){
        #    $this->load->view("login",$data);
        #}
        $data['uuid'] = $this->input->cookie('uuid');
        $this->load->view("home",$data);
    }
    function poop(){
      $this->load->view("home");
    }
}

?>