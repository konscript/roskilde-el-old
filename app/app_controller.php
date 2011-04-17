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
	
}
?>
