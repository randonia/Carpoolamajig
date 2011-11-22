<?

class Calendar extends CI_Controller{
	function index()
	{	
		/* to add more events to the calendar, add the day number as the array index
		 * and then if there's only one event put an array as the value of that day.
		 * in the array, make the name of the event the key and then the url wanted
		 * as the value (i.e. key=>value)
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
