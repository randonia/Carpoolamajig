<?
class Users extends CI_Controller{
    function index(){
        if($this->session->userdata('username')){
            #load the view now :D
            $data['title'] = "User Page";
            $this->load->view("users",$data); #change this
        } else {
            #if you aren't logged in, redirect to the login page
            #and include the destination session data so it knows where to 
            #send you
            $this->session->set_flashdata('error','You need to be logged in to view this page');
            $this->session->set_userdata('destination',"/users/editUser");
            redirect("login","refresh");
        }
    }

    function listUsers(){
        if($this->session->userdata('username')){
            #load the view now :D
            $data['title'] = "Users List";
            $this->db->select('username');
            $query = $this->db->get('users');
            $data['bigassListOfUsers'] = '';
            foreach($query->result() as $row){
                $data['bigassListOfUsers'] .= makeUserLink($row->username) . "<br>";
            }
            $this->load->view("users_list",$data); #change this
        } else {
            #if you aren't logged in, redirect to the login page
            #and include the destination session data so it knows where to 
            #send you
            $this->session->set_flashdata('error','You need to be logged in to view this page');
            $this->session->set_userdata('destination',"/users/listUsers");
            redirect("login","refresh");
        }
    }
    
    function showUser($username=''){
        #if no argument is provided, do this
        if($username=='' && !$this->session->userdata('username')){
            redirect(site_url(),"refresh");
        } else if($this->session->userdata('username') && $username == ''){
            $username = $this->session->userdata('username');
        }
        $data['title'] = $username . "'s Profile!"; #and you guys were yelling at me for exlaimation marks :<
        $data['username'] = $username;
        #get the id
        $this->db->select('*');
        #from the db 'users' where username==$username
        $query = $this->db->get_where('users',array('username' => $username));
        #init $id because I don't know if the scope will pwn $id
        $id='0';
        #grab the id and send it to $id
        foreach($query->result() as $row){
            $id=$row->id;
            $data['avatarURL'] = $row->avatarURL;
        }
        #now select bio
        $this->db->select('*');
        #from the bios db where id==$id
        $query = $this->db->get_where('bios',array('id'=>$id));
        #print it?
        foreach($query->result() as $row){
            $data['bio'] = $row->bio;
        }
        #start lookin at poolerBios
        $this->db->select('*');
        $query = $this->db->get_where('poolerBios',array('id'=>$id));
        foreach($query->result() as $row){
            $data['poolerScore'] = $row->score;
            $data['carMake'] = $row->carMake;
            $data['carSeats'] = $row->carSeats;
            $data['carGasComp'] = $row->carGasComp;
            $data['carAmenities'] = $row->carAmenities;
            $data['numRides'] = $row->numRides;
        }
        
        #start lookin at riderBios
        $this->db->select('*');
        $query = $this->db->get_where('riderBios',array('id'=>$id));
        foreach($query->result() as $row){
            $data['riderScore'] = $row->score;
        }
        $this->load->view('viewuser',$data);
    }

    #edits the selected user
    function editUser($username=''){
        #if no argument is provided, do this
        if($username=='' && !$this->session->userdata('username')){
            redirect(site_url(),"refresh");
        }
        $username = $this->session->userdata('username');
        $data['title'] = "Edit Profile";
        $data['username'] = $username;
        #get the ID
        $this->db->select('*');
        #from the db 'users' where username==$username
        $query = $this->db->get_where('users',array('username' => $username));
        #init $id because I don't know if the scope will pwn $id
        $id='0';
        #grab the id and send it to $id
        foreach($query->result() as $row){
            $id=$row->id;
            $data['email'] = $row->email;
            $data['avatarURL'] = $row->avatarURL;
        }

        #Grab the bios
        $this->db->select('bio');
        $query = $this->db->get_where('bios', array('id'=>$id));
        foreach($query->result() as $row){
            $data['bio'] = $row->bio;
        }

        #start lookin at poolerBios
        $this->db->select('*');
        $query = $this->db->get_where('poolerBios',array('id'=>$id));
        foreach($query->result() as $row){
            $data['poolerScore'] = $row->score;
            $data['carMake'] = $row->carMake;
            $data['carSeats'] = $row->carSeats;
            $data['carGasComp'] = $row->carGasComp;
            $data['carAmenities'] = $row->carAmenities;
            $data['numRides'] = $row->numRides;
        }
        
        #start lookin at riderBios
        $this->db->select('*');
        $query = $this->db->get_where('riderBios',array('id'=>$id));
        foreach($query->result() as $row){
            $data['riderScore'] = $row->score;
        }
        $this->session->set_flashdata('status','editUserData');
        $this->load->view('users_edit',$data);
    }

    #Code to actually toss shit into the database.
    function commitUserData(){
        if($_POST && $this->session->flashdata('status')=="editUserData" && $this->session->userdata('username')){
            
			
			#TODO: Toss a fat error if they aren't logged in
            #Grab the ID for future use:
            $username = $this->session->userdata('username');
            #from the db 'users' where username==$username
            $query = $this->db->get_where('users',array('username' => $username));
            #init $id because I don't know if the scope will pwn $id
            $id='0';
            #grab the id and send it to $id
            foreach($query->result() as $row){
                $id=$row->id;
            }

            #check up on the email
            $derpta = array(
                'email' => $_POST['email']);
            #update the password as well
            if($_POST['newPassword'] != ''){
                $derpta['password'] = sha1($_POST['newPassword']);
            }
            #Update the email given
            $derpta['email'] = $_POST['email'];
            $derpta['avatarURL'] = $_POST['avatarURL'];

            #poke around the users database now
            $this->db->where('username',$username);
            $this->db->update('users',$derpta);
#            echo($this->session->userdata('username'));
            
            #now update the regular bio
            $this->db->where('id',$id);
            $this->db->update('bios',array('bio'=>$_POST['bio']));
            
            #now update the poolerBios
            $this->db->where('id',$id);
            $derpta = array('carMake'=>$_POST['carMake'],
                'carSeats'=>$_POST['carSeats'],
                'carGasComp'=>$_POST['carGasComp'],
                'carAmenities'=>$_POST['carAmenities']);
            $this->db->update('poolerBios',$derpta);

        } else {
            echo "<a href='http://www.reddit.com/r/fffffffuuuuuuuuuuuu'>Something has gone very wrong</a>";
        }
        redirect(site_url()."/users/showUser/$username","redirect");
    }
    
}
?>