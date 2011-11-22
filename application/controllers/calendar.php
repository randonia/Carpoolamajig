<?

class Calendar extends CI_Controller{
	function index()
	{	
		/* to add more events to the calendar, add the day number as the array index
		 * and then if there's only one event put a string into that index.
		 * if there's more than one event in a day, make an array and put
		 * all the event names in that array.
         */   		 
		
		$data = array( 
			5 => array('poo'=>'blah1','blah2'),
			20 => array('one of these things is not like the other')
		);
		
		$this->load->library('calendar');
		
		$vars['calendar'] = $this->calendar->generate('', '', $data);
		
		$this->load->view('calendar', $vars);
	}
}
