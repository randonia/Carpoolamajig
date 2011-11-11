<?

class Login extends CI_Controller{

      function index(){
          $data['title'] = "User Registration Page";
          if($this->session->flashdata('state')){
              $data['errorcode'] = $this->session->flashdata('state');
          }
          $this->load->view("login",$data);
      }

      function commitForm(){
      $this->load->helper('url');
	  # super simple validation
	  if(!isset($_POST) || $_POST['username'] == "" || $_POST['password1'] == "" || $_POST['password2'] == "" || $_POST['email'] == ""){
	     $data['title'] = "User Registration Page";
	     $data['errorcode'] = "You didn't do it right son";
         #make it so the browser knows the current state of "wrong pass"
         #flash data (as opposed to session data) happens once. Pretty sexy
         $this->session->set_flashdata("state","loginFail");
	     $this->load->view("login",$data);
         redirect("login",'refresh');
	}
	else {
      $this->load->helper('url');
      #*****
      #FIXME: Check if the user or email exists already
      #*****
      $data = array('username' => $_POST['username'], 
          'password' => $_POST['password1'], 'email' => $_POST['email']);
      #Generate the array to use

      #Insert the user into the database
      $this->db->insert('users', $data);

      #*****
      #FIXME: We can't do plaintext passwords. Fix this later.
      #*****

      $foo = $this->db->query('SELECT * FROM users');
      foreach($foo->result() as $row){
          echo $row->id;
          echo $row->username;
          echo $row->password;
      }
#	  $this->load->view("registered");
	}
      }
}