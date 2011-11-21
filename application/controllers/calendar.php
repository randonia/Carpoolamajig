<?

class Calendar extends CI_Controller{
	function index()
	{	
		$data = array( 
			5 => array('blah1','blah2')
		);
		
		$this->load->library('calendar');
		
		$vars['calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
		
		$this->load->view('calendar', $vars);
	}
}
