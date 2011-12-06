<?
class Login extends CI_Controller{
    function index(){
        $data['title'] = "Log in";
        $this->load->view("login",$data);
    }
    
    function commitForm(){
        $this->load->helper("url");
        #query the db for the password
        $query = $this->db->get_where('users', array('username' => $_POST['username']));
        #go through your results (should only be one row)
        foreach($query->result() as $row){
            #if the passwords match:
            if(sha1($_POST['password']) == $row->password){
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

    function resetPassword(){
        $data['title'] = "Password reset form";
        $this->load->view("password_reset",$data);
    }

    function commitResetPassword($username,$email){
        $data['title'] = "Password Reset Form";
        #if($_POST['username'] && $_POST['email']){
            
            #$tableData = array('');
            #$this->db->update('users',$tableData);
        #}
        #generate some random text for this gentleperson
        $str = randomTextGenerate();

        #update the database
        $this->db->where(array('username'=>$username,"email" => $email));
        $this->db->update('users',array("password"=>sha1($str)));

        $this->load->library('email');
        $this->email->to($email);
        $this->email->from("god@carpoolamajig.com",'Gob');
        $this->email->subject('Your password has been reset!');
        $this->email->message("Hello " . $username . "!\n\rYour password has been reset to " .
            $str . ". Please use this to log in! Thanks :D");
        $this->email->send();

        $this->load->view("reset_success",$data);
    }

    #this function is ridicululz. This place has penguins yo!
    function passwordReset($login,$email){
        $username = decodeText($login);
        $eemail = decodeText($email);
        $this->commitResetPassword($username,$eemail);
    }

    function emailResetPassword(){
        #now email them their password
        $this->load->library('email');
        $this->email->to($_POST['email']);
        $this->email->from("god@carpoolamajig.com",'Gob');
        $this->email->subject('Your password reset request');
        $this->email->message("Hello " . $_POST['username'] . "!\n\r You or someone posing as you has requested your account's password be changed. This request came from " . $_SERVER['REMOTE_ADDR'] . " at " . date("D M j G:i:s T Y") . '. If this happens a lot, please contact the admins. Otherwise, click on the following link to reset your password: \n ' . site_url() . "/login/passwordReset/" . encodeText($_POST['username']) . "/" . encodeText($_POST['email']) . "/" . randomTextGenerate());

        $this->email->send();

        echo $this->email->print_debugger();
        redirect(site_url() . "/login","refresh");
    }
}

?>