<?
class Users extends CI_Controller{
    function index(){
        $data['title'] = "User page";
        $this->load->view('users',$data);
    }
    
    function showUser($username=''){
        #if no argument is provided, punch Ryan right in the dick
        if($username==''){
            redirect(site_url(),"refresh");
        }
        $data['title'] = $username . "'s Profile!";
        $data['username'] = $username;
        #get the id
        $this->db->select('id');
        #from the db 'users' where username==$username
        $query = $this->db->get_where('users',array('username' => $username));
        #init $id because I don't know if the scope will pwn $id
        $id='0';
        #grab the id and send it to $id
        foreach($query->result() as $row){
            $id=$row->id;
        }
        #now select bio
        $this->db->select('bio');
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
        #if no argument is provided, punch Ryan right in the dick
        if($username==''){
            redirect(site_url(),"refresh");
        }
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
        if($_POST && $this->session->flashdata('status')=="editUserData"){
            $this->db->where('username',$username);
            #check up on the email
            $derpta = array(
                'email' => $_POST['email']);
            #update the password as well
            if($_POST['newPassword'] != ''){
                $derpta['password'] = $_POST['newPassword'];
            }
            #
        } else {
            
        }
    }
    
}
?>