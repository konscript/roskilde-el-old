<?php
class AppController extends Controller {

    var $components = array('Acl', 'Auth', 'Session', 'Email', 'SwiftMailer');
    var $helpers = array('Form', 'Session', 'Output');

    // Configures AuthComponent (for Authentication and ACL)
    function beforeFilter() {
        $this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'Application/Controllers/';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');
        $this->Auth->authError = "Du har ikke rettigheder til den pågældende handling/ressource.";
        $this->Auth->loginError = "Ugh, du har angivet et forkert brugernavn eller adgangskode!";
    }
	
	// Set current user data (from session) to a global view variable
    function beforeRender() {
    	$currentuser = $this->Auth->user();
        $this->set('currentuser', $currentuser['User']);
	}

	// Private method for sending a welcome e-mail to new users
	// Returns true if succesful
	function _userMail($name, $email, $password) {
		
		// Using SwiftMailer with TLS SMTP turned on
					
        $this->SwiftMailer->smtpType = 'ssl'; 
        $this->SwiftMailer->smtpHost = 'webmail.roskilde-festival.dk'; 
        $this->SwiftMailer->smtpPort = 25; 
        $this->SwiftMailer->smtpUsername = 'nicolai.johansen'; 
        $this->SwiftMailer->smtpPassword = 'ProBlematic4Sure'; 

        $this->SwiftMailer->sendAs = 'html'; 
        $this->SwiftMailer->fromName = 'Roskilde Festival';
        $this->SwiftMailer->from = 'nicolai.johansen@roskilde-festival.dk'; 
		$this->SwiftMailer->replyTo = 'nicolai.johansen@roskilde-festival.dk';
		$this->SwiftMailer->bcc = 'el@laander.com';
        $this->SwiftMailer->to = $email; 

        $this->set('name', $name);
        $this->set('email', $email);
		$this->set('password', $password);
         
		try { 
	        $result = $this->SwiftMailer->send('welcome', 'Roskilde Festival: Oprettet som bruger i el-system');  
			if($result) {
				return true;
			} else { return false; }	               
        } catch (Exception $e) { 
			$this->log("Problem with sending e-mail through SwiftMailer: ".$e);
			return false;
        }
        
        // Built-in Cakephp mailer with SMTP (no TLS)
        
		/*$this->Email->from    = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
		$this->Email->to      = $email;
		$this->Email->subject = 'Roskilde Festival: Oprettet som bruger i el-system';
	    $this->Email->replyTo = 'nicolai.johansen@roskilde-festival.dk';
	    $this->Email->template = 'welcome'; // note no '.ctp'

        $this->set('name', $name);
        $this->set('email', $email);
		$this->set('password', $password);
       
		$this->Email->smtpOptions = array(
	        'port'=>'25', 
	        'timeout'=>'90',
	        'host' => 'webmail.roskilde-festival.dk.',
	        'username'=>'nicolai.johansen',
	        'password'=>'ProBlematic4Sure',
		);
	
	    $this->Email->delivery = 'smtp';
	    $result = $this->Email->send();
	
	    $this->set('smtp-errors', $this->Email->smtpError);

		if ($result) {
			return true;
		} else { debug($this->Email->smtpError); return false; }	    */           

	}	
	  
}
?>
