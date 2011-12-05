<?

class EmailSetup extends CI_Controller{
    function index(){
        $config['protocol'] = "smtp";
        $config['mailpath'] = "/usr/sbin/sendmail";
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        
        $config['smtp_host'] = "mail.zambinidirect.com";
        $config['smtp_user'] = "god@carpoolamajig.com";
        $config['smtp_pass'] = "thispasswordisverysecure";
        $config['smtp_port'] = "26";
        $config['smtp_auth'] = TRUE;

       # $this->email->initialize($config);
        $this->load->library('email',$config);
        $this->test();
    }
    function test(){
        $this->load->library('email');
        $this->email->from('god@carpoolamajig.com','Gob');
        $this->email->to('randonia@ucsc.edu');
        $this->email->subject('Testies');
        $this->email->message('Testing the email class!');
        $this->email->send();
        echo $this->email->print_debugger();
    }
}

?>