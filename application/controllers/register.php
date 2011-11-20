<?

class Register extends CI_Controller{

      function index(){
          $data['title'] = "User Registration Page";
          #Check to see if we have some flash data signifying registration failure
          if($this->session->flashdata('state') == "registrationFailed"){
              $data['errorcode'] = $this->session->flashdata('errorcode');
              echo $data['errorcode'];
          }
          $this->load->view("register",$data);
      }

      function commitForm(){
      $this->load->helper('url');
      $data['title'] = "User Registration Page";
	  # super simple validation.
      #******
      #FIXME: We need to make this less shitty
      #******
	  if(!isset($_POST) || $_POST['username'] == "" || $_POST['password1'] == "" || $_POST['password2'] == "" || $_POST['email'] == ""){
	     $data['errorcode'] = "You didn't do it right son";
         #make it so the browser knows the current state of "wrong pass"
         #flash data (as opposed to session data) happens once. Pretty sexy
         $this->session->set_flashdata("state","registrationFailed");
         $this->session->set_flashdata("errorcode","improperInput");
	     $this->load->view("register",$data);
         redirect("register",'refresh');
	}
	else {
      $this->load->helper('url');

      #Check if the username exists!
      $query = $this->db->get_where('users', array('username' => $_POST['username']));
#      $namecheck = $this->db->query("SELECT username FROM users WHERE " . 
#          "`username`='" . $_POST['username'] . "'");
      #If it does, set some flash data for failure
      $flag = false;
      #The existence of a row here means the query returned something, which means the username
      # exists in the database
      foreach ($query->result() as $row){
          $flag = true;
      }
      if($flag){
          #state is 'registrationFailed' and errorcode is 'usernameTaken'
          $this->session->set_flashdata("state","registrationFailed");
          $this->session->set_flashdata("errorcode","usernameTaken");
          #and go back to this page.
          $data['errorcode'] = 'usernameTaken';
          $this->load->view("register",$data);
#          redirect("register",'refresh');
      } else {
          #The array to be passed into the insert function
          $insertionData = array('username' => $_POST['username'], 
              'password' => $_POST['password1'], 'email' => $_POST['email']);

          #Insert the user into the database
          $this->db->insert('users', $insertionData);

          #*****
          #FIXME: We can't do plaintext passwords. Fix this later
          #*****

          #Set the user data field "user" to the username!
          $this->session->set_userdata('user',$_POST['username']);
          #Push that into the array to pass into the view
          $data['title'] = "Welcome " . $_POST['username'];
          #Load the view "registered"
          $this->load->view("registered", $data);
      }
	}
      }
}