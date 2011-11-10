<?

class Calendar extends CI_Controller{
  function index(){
    $this->load->library('calendar');
    $data = array( 5 => 'http://www.google.com');
    echo $this->calendar->generate(2011,10,$data);
  }

}

?>