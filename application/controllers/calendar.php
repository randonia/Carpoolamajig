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
        #go through each result and populate this data shits!
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
                foreach($tPerms as $dick){
                    if($dick == $username){
                        $permFlag = true;
                        #echo "WOOT $dick";
                        break;
                    }
                }
            }
            
            if($permFlag){
                #so if you have permission you ass
                #This shit's complex
                $data[date("j",$row->date)][$row->title] = site_url() . "/events/showEvent/$row->uuid";
            }
#            echo "<br>";
        }
#		$data = array( 
#			5 => array('poo'=>'blah1','blah2'),
#			20 => array('one of these things is not like the other')
#		);

		$this->load->library('calendar');
        $vars['calendar'] = $this->calendar->generate($year,$month, $data);
        $vars['year'] = $year;
        $vars['month'] = $month;
        #
        # FIXME: Toss some logic in here so it doesn't do that whole "negative a billion" thing
        #
        $vars['prevYear'] = intval($year) - 1;
        $vars['prevMonth'] = intval($month) - 1;
        $vars['nextYear'] = intval($year) + 1;
        $vars['nextMonth'] = intval($month) + 1;
		$this->load->view('calendar', $vars);
	}
}
