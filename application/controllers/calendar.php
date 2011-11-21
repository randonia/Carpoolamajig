<?

class Calendar extends CI_Controller{
	function index()
	{	
		$data = array( 
			5 => array("http://www.google.com"),
			6 => array("http://www.google.com")
		);
		
		$this->load->library('calendar');
		
		$vars['calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
		
		$this->load->view('calendar', $vars);
	}
}
