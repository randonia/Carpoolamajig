<?

class Login extends CI_Controller{
    function index(){
        $data['title'] = "Log in";
        $this->load->view("login",$data);
    }
    
    function commitForm(){
        $this->load->helper("url");
        #query the db for the password shits
        $query = $this->db->get_where('users', array('username' => $_POST['username']));
        #go through your results (should only be one row)
        foreach($query->result() as $row){
            #if the passwords match:
            if($_POST['password'] == $row->password){
                #set user data for 'username'
                $this->session->set_userdata('username',$_POST['username']);
                $data['title'] = "Thank you for logging in, " . $_POST['username'];
                $data['username'] = $_POST['username'];
                $this->load->view("loggedin",$data);
            } else {
                #unset it to make sure it's not there
                $this->session->unset_userdata('username');
                $this->session->set_flashdata('error','Wrong password');
                $this->session->set_flashdata('username',$_POST['username']);
                redirect("login","refresh");
            }
        }
        
    }
}

?>