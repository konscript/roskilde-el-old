<?php
class AppController extends Controller {

    var $components = array('Acl', 'Auth', 'Session', 'Email', 'SwiftMailer');

    function beforeFilter() {
        // configure AuthComponent (for Authentication and ACL)
        $this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'Application/Controllers/';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');
        $this->Auth->authError = "Du har ikke rettigheder til den pågældende handling/ressource.";
        $this->Auth->loginError = "Baahh, du har angivet et forkert brugernavn eller adgangskode.";
    }

	// Private method for sending a welcome e-mail to new users
	// Returns true if succesful
	function _userMail($name, $email, $password) {
					
        $this->SwiftMailer->smtpType = 'tls'; 
        $this->SwiftMailer->smtpHost = 'smtp.gmail.com'; 
        $this->SwiftMailer->smtpPort = 465; 
        $this->SwiftMailer->smtpUsername = 'el@laander.com'; 
        $this->SwiftMailer->smtpPassword = 'Laander1193'; 

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

		// using the built-in e-mail component in CakePHP (currently unused, switched to SwiftMailer for TLS SMTP support)
/*		$this->Email->from    = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
		$this->Email->replyTo = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
		$this->Email->to      = $name." <".$email.">";
		$this->Email->subject = 'Roskilde Festival: Oprettet som bruger i el-system';
        $this->Email->template = 'welcome';
        $this->Email->sendAs = 'html';
        
        $this->set('name', $name);
        $this->set('email', $email);
		$this->set('password', $password);
		
		$result = $this->Email->send(); 
		
		if($result) {
			return true;
		} else { return false; } */
	}	
	  
}
?>