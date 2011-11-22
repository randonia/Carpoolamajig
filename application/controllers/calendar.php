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
<<<<<<< HEAD
			5 => array('blah1','blah2'),
			20 => 'one of these things is not like the other'
=======
			5 => array("http://www.google.com"),
			6 => array("http://www.google.com")
>>>>>>> b89b94ab04dca8e235b6c6894e95be84e2b81137
		);
		
		$this->load->library('calendar');
		
		$vars['calendar'] = $this->calendar->generate('', '', $data);
		
		$this->load->view('calendar', $vars);
	}
}
