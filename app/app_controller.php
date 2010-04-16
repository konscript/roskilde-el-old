<?php
class AppController extends Controller {

    var $components = array('Acl', 'Auth', 'Session', 'Email');

    function beforeFilter() {
        // Configure AuthComponent (for Authentication and ACL)
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
			
		$this->Email->from    = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
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
		} else { return false; }
		
	}	
	  
}
?>