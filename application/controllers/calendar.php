<?
class Calendar extends CI_Controller{
	function index($year='',$month='')
	{	
		/* to add more events to the calendar, add the day number as the array index
		 * and then if there's only one event put an array as the value of that day.
		 * in the array, make the name of the event the key and then the url wanted
		 * as the value (i.e. key=>value)
         */   		 
		$this->db->select("uuid,title,date,permissionedPeople");
        $query = $this->db->get("events");
        $vars['title'] = "View Calendar";
        if($this->session->userdata('username')){
            $username = $this->session->userdata('username');
        }
        
        #We've got out data array hrrr
        $data = array();
        #go through each result and populate this data!
        foreach($query->result() as $row){
            #echo "Starting on " . print_r($row);
            #echo " :::" . date("d",$row->date);
            #use this to see if this current user has permissions to view this event
            $permFlag = false;
            $tPerms = explode("|",$row->permissionedPeople);
            if($tPerms[0] == -1){
                $permFlag = true;
            } else {
                unset($tPerms[0]);
                #See if this username is in the permissioned people list
                foreach($tPerms as $hair){
                    if($hair == $username){
                        $permFlag = true;
                        break;
                    }
                }
            }
            
            if($permFlag){
                #grab the current date to make sure it's okay to show for this date
                #so if you have permission you ask
                #This stuff's complex
                #If year and month are not passed in as arguments, then we assume it's today
                if($year=='' || $month==''){
                    $year = date('Y',time());
                    $month = date('n',time());
                }
                #check if the event should be viewed in this calendar
                if($year == date('Y',$row->date) && $month == date('n',$row->date)){
                    $data[date("j",$row->date)][$row->title] = site_url() . "/events/showEvent/$row->uuid";
                }
            }
        }
#               Here is how to use the data array!
#		$data = array( 
#			5 => array('poo'=>'blah1','blah2'),
#			20 => array('one of these things is not like the other')
#		);

		$this->load->library('calendar');
        $vars['calendar'] = $this->calendar->generate($year,$month, $data);
        $vars['year'] = $year;
        $vars['month'] = $month;
        
        if($month == 1){
            $vars['previousURI'] = strval($year-1) . "/" . "12";
            $vars['nextURI'] = strval($year) . "/" . "2";
        } else if ($month == 12){
            $vars['previousURI'] = strval($year) . "/" . "11";
            $vars['nextURI'] = strval($year+1) . "/" . "1";
        } else {
            $vars['previousURI'] = strval($year) . "/" . strval($month-1);
            $vars['nextURI'] = strval($year) . "/" . strval($month+1);
        }
        $vars['todayURI'] = strval(date('Y',time())) . "/" . strval(date('n',time()));

		$this->load->view('calendar', $vars);
	}
}
